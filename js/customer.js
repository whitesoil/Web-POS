window.onload = function() {
	new Ajax.Request("./php/customer-php.php",{
		method: "get",
		parameters: {type : "start"},
		onSuccess: initList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
	});
	 $("search").onclick=function(){
		var customer = document.getElementsByName("name");
		var selectedCustomer;
		 
		for (var i = 0; i<customer.length; i++){
		if(customer[i].checked)
		selectedCustomer = customer[i].value;
		}
		 
		new Ajax.Request("./php/customer-php.php",{
		method: "get",
		parameters: {type : "search", name : $("name").value},
		onSuccess: initList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
		});
	};
		 
    $("add").onclick=function(){
		$("dialog-add").show();
	};
	
		
	$("del2").onclick=function(){
		$("dialog-del").show();
	};
	
	$("del-cancel").onclick=function(){
		$("del-id").value ="";
		$("dialog-del").hide();
	};
	
	$("del-del").onclick=function(){
		new Ajax.Request("./php/customer-php.php", {
            method: "get",
            parameters: {type : "del-del", id : $("del-id").value},
            onSuccess: deleteList,
            onFailure: ajaxFailed,
            onException: ajaxFailed
        });	
	};
	
	$("add-add").onclick=function(){
			new Ajax.Request("./php/customer-php.php", {
            method: "get",
            parameters: {type : "add-add", name : $("add-name").value, phone : $("add-phone").value},
            onSuccess: addList,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
	};

	$("add-cancel").onclick=function(){
		$("add-name").value = "";
		$("add-phone").value = "";
		$("dialog-add").hide();
	};
};
function initList(ajax){
	del_list();
    var data = JSON.parse(ajax.responseText);
    for (var i = 0; i < data.customer.length; i++) {
        var tr = document.createElement("tr");
		var td1 = document.createElement("td");
		var td2 = document.createElement("td");
		var td3 = document.createElement("td");
		
		tr.addClassName("tr");
        td1.innerHTML = data.customer[i].id;
		td2.innerHTML = data.customer[i].name;
		td3.innerHTML = data.customer[i].phone;
		tr.id = data.customer[i].id;
        tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		$("table").appendChild(tr);
    }
}


function addList(ajax){
	$("add-name").value = "";
	$("add-phone").value = "";
	$("dialog-add").hide();
	location.reload();
}

function del_list(){
  var past_datas = $$(".tr");
  for(var i = past_datas.length-1; i>= 0 ; i--){
      past_datas[i].remove();
  }
}

function deleteList(ajax){
	$("del-id").value ="";
	$("dialog-del").hide();
	location.reload();
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