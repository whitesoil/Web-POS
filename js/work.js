var DeletedList; //Store ID
var clickedItem; //Store ID

window.onload = function() {
	DeletedList = "";
	clickedItem = "";
	new Ajax.Request("./php/work-php.php",{
		method: "get",
		parameters: {type : "start"},
		onSuccess: initList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
	});
	
		/*
	* Delete
	*/
	
	$("delete-delete").onclick = function(){
			new Ajax.Request("./php/work-php.php", {
			method: "get",
			parameters: {type : "delete", id : DeletedList},
			onSuccess: deleteItem,
			onFailure: ajaxFailed,
			onException: ajaxFailed
		});
	};
	
	$("delete-cancel").onclick = function(){
		$("dialog-delete").hide();
		DeletedList = "";
	};
	
	/*
	* Finish
	*/
	$("finish_button").onclick = function(){
		$("dialog-finish").show();
	};
	
	$("finish-finish").onclick = function(){
		if(clickedItem != ""){
			// var x = $(order-price).innerHTML;
			new Ajax.Request("./php/work-php.php", {
			method: "get",
			parameters: {type : "finish", id : clickedItem, price :$('order-price').innerHTML},
			onSuccess: finishItem,
			onFailure: ajaxFailed,
			onException: ajaxFailed
			});	
		}else{
			$("dialog-finish").hide();
		}
		
	};
	
	$("finish-cancel").onclick = function(){
		$("dialog-finish").hide();
	};
};

function del_list(){
  var past_data = $$(".orders");
  for(var i = past_data.length-1; i>= 0 ; i--){
      past_data[i].remove();
  }
}

function finishItem(ajax){
	
	$("dialog-finish").hide();
	$(clickedItem).remove();
}

function clickItem(){
	var contents = this.up('div',0);
	clickedItem = contents.id;
	
	new Ajax.Request("./php/work-php.php",{
		method: "get",
		parameters: {type : "list", id : clickedItem},
		onSuccess: showList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
	});
}

function callDelete(){
	var div = this.up('div',1);
	DeletedList = div.id;
	$("dialog-delete").show();
}


function initList(ajax){
  var data = JSON.parse(ajax.responseText);
  del_list();
  for(var i = 0; i < data.info.length;i++){
		var orders = document.createElement("div");
	  	orders.addClassName("orders");
	  	orders.id = data.info[i].id;
	  
		var contents = document.createElement("button");
	  	contents.addClassName("btn btn-default order-info");
	  
		var container = document.createElement("div");
	  
		var name = document.createElement("h3");
		name.addClassName("name");
	  	name.innerHTML = data.info[i].name;
	  	name.title = data.info[i].phone;
	  	
	  
	  	
	  	var list = document.createElement("ul");
	  
	  	/*
		* get list
		*/
	//   [
	//   	{
	//  	info : [
	// 	  		{
	// 			name : seon,
	// 			phone : 01099889131,
	//	  		id : 123,
	// 			list : [
	//	  				{ name : item, amount : 5, price : 123},
	// 					{ name : item, amount : 5, price : 123},
	// 					{ name : item, amount : 5, price : 123}
	// 					]
	// 			},
	// 			{
	// 			name : seon,
	// 			phone : 01099889131,
	//	  		id : 123,	  
	// 			list : [
	//  				{ name : item, amount : 5, price : 123},
	// 					{ name : item, amount : 5, price : 123},
	// 					{ name : item, amount : 5, price : 123}
	// 					]
	// 			}
	// 		]
  	//	}
	// ]
	  	for(var y = 0;y <data.info[i].list.length ; y++){
			var li = document.createElement("li");
			var span1 = document.createElement("span");
			var span2 = document.createElement("span");
			var span3 = document.createElement("span");
			
			span1.innerHTML = data.info[i].list[y].iname;
			span2.innerHTML = " : ";
			span3.innerHTML = data.info[i].list[y].amount;
			li.appendChild(span1);
			li.appendChild(span2);
			li.appendChild(span3);
			list.appendChild(li);
		}
		
	  
	  	var div = document.createElement("div");
	  	
	  	var del = document.createElement("button");
		del.addClassName("btn btn-danger item-buttons");
		del.innerHTML = "Delete";
		del.id = "delete";
	  	del.onclick = callDelete;
	  	
		container.appendChild(name);
	  	container.appendChild(list);
	  	contents.appendChild(container);
	  	contents.onclick = clickItem;
	  	
	  	div.appendChild(del);
	  	
	  	orders.appendChild(contents);
	  	orders.appendChild(div);
	  
		$("item-list").insert(orders);
    }
}

function showList(ajax){
	 var past_data = $$(".list-group-item");
	  for(var i = past_data.length-1; i>= 0 ; i--){
    	  past_data[i].remove();
  		}
	var data = JSON.parse(ajax.responseText);
	var total = 0;
	
	$("profile-name").innerHTML = data.info[0].name;
	$("profile-phone").innerHTML = data.info[0].phone;
	
	for(var i = 0;i <data.info[0].list.length ; i++){
			var li = document.createElement("li");
			li.addClassName("list-group-item");
			li.innerHTML= data.info[0].list[i].iname + " : ";
		
			var span = document.createElement("span");
			span.innerHTML = data.info[0].list[i].amount;
		
			li.appendChild(span);
			$("order-list-detail").appendChild(li);
		
			total += parseInt(data.info[0].list[i].price) * parseInt(data.info[0].list[i].amount);
	}
	
	$("order-price").innerHTML = total;
	
}

function deleteItem(ajax){
	$("dialog-delete").hide();
	$(DeletedList).remove();
}

function ajaxFailed(ajax,exception){
	// alert("error");
		var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}