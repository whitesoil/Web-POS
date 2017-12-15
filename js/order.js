var EditedItem;
var DeletedItem;
var clickedList = [];

window.onload = function() {

	new Ajax.Request("./php/order-php.php",{
		method: "get",
		parameters: {type : "start"},
		onSuccess: initList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
	});
	
	/*
	* Register
	*/
	$("register").onclick=function(){
		$("dialog-register").show();
	};
	
	$("register-add").onclick=function(){
		var preg_p = /^[1-9]\d*$/;
		
		if(!preg_p.test($("register-price").value)){
			alert("Invalid value");
		}else{
			new Ajax.Request("./php/order-php.php", {
            method: "get",
            parameters: {type : "register-add", name : $("register-name").value, price : $("register-price").value},
            onSuccess: addList,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
		}
		
	};
	
	$("register-cancel").onclick=function(){
		$("register-name").value = "";
		$("register-price").value = "";
		$("dialog-register").hide();
	};
	
	/*
	* Edit
	*/
	
	
	$("edit-edit").onclick=function(){
		
		new Ajax.Request("./php/order-php.php", {
			method: "get",
			parameters: {type : "edit", past : EditedItem, name : $("edit-name").value, price : $("edit-price").value},
			onSuccess: editItem,
			onFailure: ajaxFailed,
			onException: ajaxFailed
		});
		
	};
	
	$("edit-cancel").onclick=function(){
		$("edit-name").value = "";
		$("edit-price").value = "";
		$("dialog-edit").hide();
		EditedItem = "";
	};
	
	// profile
	$("find-cus").onclick=function(){
		new Ajax.Request("./php/order-php.php", {
			method: "get",
            parameters: {type : "find-cus", phone : $("phone").value},
            onSuccess: loadCustomerInfo,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
		
	};
	
	/*
	* Delete
	*/
	
	$("delete-delete").onclick = function(){
			new Ajax.Request("./php/order-php.php", {
			method: "get",
			parameters: {type : "delete", name : DeletedItem},
			onSuccess: deleteItem,
			onFailure: ajaxFailed,
			onException: ajaxFailed
		});
	};
	
	$("delete-cancel").onclick = function(){
		$("dialog-delete").hide();
		DeletedItem = "";
	};
	
	/*
	* Order
	*/
	
	$("order-button").onclick = function(){
		$("dialog-order").show();
	};
	
	$("order-cancel").onclick = function(){
		$("dialog-order").hide();
	};
	
	$("order-order").onclick = function(){
		
		var query = [{data : clickedList}];
		var json = JSON.stringify(query);
		var cname = $("profile-phone").innerHTML;

		if(cname == ""){
			alert("Invalid Customer");
			orderSuccess();
		}else{
			new Ajax.Request("./php/order-php.php", {
				method: "get",
				parameters: {type : "order", list : json, phone : cname},
				onSuccess: orderSuccess,
				onFailure: ajaxFailed,
				onException: ajaxFailed
			});
		}
	};
};


function orderSuccess(ajax){
	var past_datas = $$(".list-group-item");
  	for(var i = past_datas.length-1; i>= 0 ; i--){
      past_datas[i].remove();
  	}
	clickedList = [];
	$("order-price").innerHTML = "";
	$("dialog-order").hide();
}


function del_list(){
  var past_datas = $$("div.items");
  for(var i = past_datas.length-1; i>= 0 ; i--){
      past_datas[i].remove();
  }
}

function callEdit(){
	var parent = this.up('div',1);
	var temp = parent.getElementsByTagName("p");
	EditedItem = temp[0].innerHTML;
	$("dialog-edit").show();
}

function callDelete(){
	var parent = this.up('div',1);
	var temp = parent.getElementsByTagName("p");
	DeletedItem = temp[0].innerHTML;
	$("dialog-delete").show();
}

function clickItem(){
	var parent = this.up('div',0);
	var temp = parent.getElementsByTagName("p");
	var item_name = temp[0].innerHTML;
	var item_price = parseInt(temp[1].innerHTML);
	
	for(var i =0;i <clickedList.length;i++){
		if(clickedList[i].name == item_name){
			clickedList[i].amount++;
			orderList();
			return;
		}
	}
	clickedList.push({name : item_name, price : item_price, amount : 1});
	orderList();
	
}

function reduce(){
	var li = this.up('li',0);
	var name = li.title;
	for(var i =0;i <clickedList.length;i++){
		if(clickedList[i].name == name){
			clickedList[i].amount--;
			if(clickedList[i].amount == 0){
				if(clickedList.length == 1){
					clickedList = [];
				}else{
					for(var x = i; x < clickedList.length-1; x++){
						clickedList[x] = clickedList[x+1];
					}
					clickedList.pop();
				}
			}
			orderList();
			return;
		}
	}
}

function orderList(){
	var past_datas = $$(".list-group-item");
	var total_price = 0;
  	for(var j = past_datas.length-1; j>= 0 ; j--){
      past_datas[j].remove();
  	}
	for(var i =0;i<clickedList.length;i++){
		var list = document.createElement("li");
		list.addClassName("list-group-item");
		var span = document.createElement("span");
		var btn = document.createElement("button");
		btn.addClassName("btn btn-danger reduce");
		
		list.title = clickedList[i].name;
		list.innerHTML = clickedList[i].name + " : ";
		span.innerHTML = clickedList[i].amount;
		btn.innerHTML = '-';
		btn.onclick = reduce;
		total_price += clickedList[i].amount * clickedList[i].price;
		list.appendChild(span);
		list.appendChild(btn);
		$("order-list-detail").appendChild(list);
	}
	$("order-price").innerHTML = total_price;
}

function initList(ajax){
  var data = JSON.parse(ajax.responseText);
  for(var i = 0; i < data.info.length;i++){
		var container = document.createElement("div");
	  	container.addClassName("items");
	  
		var item = document.createElement("button");
	  	item.addClassName("btn btn-default item-info");
	  
		var name = document.createElement("p");
		var price = document.createElement("p");
		name.addClassName("name");
		price.addClassName("price");
	  	name.innerHTML = data.info[i].name;
		price.innerHTML = data.info[i].price;
	  
	  	var div = document.createElement("div");
	  	var edit = document.createElement("button");
	  	edit.addClassName("btn btn-info item-buttons edit");
		edit.innerHTML = "Edit";
	  	
	  	
	  	var del = document.createElement("button");
		del.addClassName("btn btn-danger item-buttons delete");
		del.innerHTML = "Delete";
 	
		item.appendChild(name);
	  	item.appendChild(price);
	  	container.appendChild(item);
	  	
	  	div.appendChild(edit);
	  	div.appendChild(del);
	  	container.appendChild(div);
	  
	  	edit.onclick = callEdit;
		del.onclick = callDelete;
	  	item.onclick = clickItem;
		$("item-list").insert(container);
    }
	
}


function addList(ajax){
	var data = JSON.parse(ajax.responseText);
	$("register-name").value = "";
	$("register-price").value = "";
	$("dialog-register").hide();
		var container = document.createElement("div");
	  	container.addClassName("items");
	  
		var item = document.createElement("button");
	  	item.addClassName("btn btn-default item-info");
	  
		var name = document.createElement("p");
		var price = document.createElement("p");
		name.addClassName("name");
		price.addClassName("price");
	  	name.innerHTML = data.info[0].name;
		price.innerHTML = data.info[0].price;
	  
	  	var div = document.createElement("div");
	  	var edit = document.createElement("button");
	  	edit.addClassName("btn btn-info item-buttons edit");
		edit.innerHTML = "Edit";
		

	  	var del = document.createElement("button");
		del.addClassName("btn btn-danger item-buttons delete");
		del.innerHTML = "Delete";

		item.appendChild(name);
	  	item.appendChild(price);
	  	container.appendChild(item);
	  	
	  	div.appendChild(edit);
	  	div.appendChild(del);
	  	container.appendChild(div);
	
	 	edit.onclick= callEdit;
		del.onclick = callDelete;
		item.onclick = clickItem;
		$("item-list").insert(container);		
}


function editItem(ajax){
	var data = JSON.parse(ajax.responseText);
	var info = $("item-list").getElementsByTagName("p");
	
	for(var i = 0; i <info.length;i++){
		if(info[i].innerHTML == EditedItem){
			info[i].innerHTML = data.info[0].name;
			info[i+1].innerHTML = data.info[0].price;
			break;
		}
	}
	$("edit-name").value = "";
	$("edit-price").value = "";
	$("dialog-edit").hide();
}

function deleteItem(ajax){
	$("dialog-delete").hide();
	var info = document.getElementsByTagName("p");
	for(var i = 0; i <info.length;i++){
		if(info[i].innerHTML == DeletedItem){
			var item = info[i].up('div',0);
			item.parentNode.removeChild(item);
			break;
		}
	}
	DeletedItem = "";
}


function loadCustomerInfo(ajax){
	var data = JSON.parse(ajax.responseText);
	
	$("profile-name").innerHTML = data.info[0].name;
	$("profile-phone").innerHTML = data.info[0].phone;
}

function ajaxFailed(ajax,exception){
		var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}