window.onload = function() {
	new Ajax.Request("./php/sales-php.php",{
		method: "get",
		parameters: {type : "start"},
		onSuccess: initList,
		onFailure: ajaxFailed,
		onException: ajaxFailed
	});
	
	$("searchMonth").onclick = function(){
		new Ajax.Request("./php/sales-php.php",{
		method: "get",
		parameters: {type : "month", month : classifier($("months").value), year : $("years").value},
		onSuccess: showMonth,
		onFailure: ajaxFailed,
		onException: ajaxFailed
		});	
	};
	
};

function initList(ajax){	
	var data = JSON.parse(ajax.responseText);
	for(var i = 0;i<data.list.length; i++){
		
		var li = document.createElement("li");
		li.addClassName("list-group-item");
		
		var span1 = document.createElement("span");
		span1.innerHTML = data.list[i].year + "년 : ";
		
		var span2 = document.createElement("span");
		span2.innerHTML = data.list[i].price+"원";
		
		li.appendChild(span1);
		li.appendChild(span2);
		$("yearList").appendChild(li);
	}
}

function del_list(){
	var past_datas = $$(".month");
  for(var i = past_datas.length-1; i>= 0 ; i--){
      past_datas[i].remove();
  }
}

function showMonth(ajax){
	del_list();
	var data = JSON.parse(ajax.responseText);
	for(var i = 0;i<data.list.length; i++){
		
		var li = document.createElement("li");
		li.addClassName("list-group-item month");
		
		var span1 = document.createElement("span");
		span1.innerHTML = data.list[i].day + "일 : ";
		
		var span2 = document.createElement("span");
		span2.innerHTML = data.list[i].price+"원";
		
		li.appendChild(span1);
		li.appendChild(span2);
		$("monthList").appendChild(li);
	}
}

function classifier(month){
	switch(month){
		case "January":
			return "01";
		case "Febrary":
			return "02";
		case "March":
			return "03";
		case "April":
			return "04";
		case "May":
			return "05";
		case "June":
			return "06";
		case "July":
			return "07";
		case "Agust":
			return "08";
		case "September":
			return "09";
		case "October":
			return "10";
		case "November":
			return "11";
		case "December":
			return "12";
		default:
			return "";
		}
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
