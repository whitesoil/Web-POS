<?php
session_start();
if($_SESSION["email"]==""){
		echo "<script>alert('Login plz!')</script>";
		echo "<script>location.href='./login.html'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Show me the money</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script>
	<script src="./js/order.js" type = "text/javascript"></script>
	<link rel = "stylesheet" href = "./css/order.css">
	<link rel = "stylesheet" href = "./css/dialog.css?var=2">
</head> 
	
<body>
	
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark" style = "margin-top : 5%;">
	  <!-- Links -->
		
			 <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-list nav-link" href="./order.php" style = "color : white;">Order</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link nav-list" href="./work.php" style = "color : white;">Work</a>
				</li>
				<li class="nav-item">
				  <a class="nav-list nav-link" href="./sales.php" style = "color : white;">Sales</a>
				</li>
				<li class="nav-item">
				  <a class="nav-list nav-link" href="./customer.php" style = "color : white;">Customer</a>
				</li>
				<li class="nav-item">
				  <a class="nav-list nav-link" href="./help.php" style = "color : white;">Help</a>
				</li>
				 <li class="nav-item">
    			  <a class="nav-list nav-link" href="./logout.php" style = "color : white;">logout</a>
   				 </li>
			 </ul>					
	</nav>
	

	<div id = "detail">
		<div id = "search-customer">
			<input type = "number" placeholder = "Phone number" id = "phone" maxlength = "11" class = "form-control">

			</input>
			<button class = "btn btn-info" type = "button" id = "find-cus">
				search
			</button>	
		</div>
		<div id = "profile">
			<p>
				Name : <span  id = "profile-name"></span>
			</p>
			<p>
				Phone :  <span  id = "profile-phone"></span>
			</p>
			<hr>
		</div>
		
		<div id = "order-list" >
			  <ul class="list-group" id = "order-list-detail">
				<!-- <li class="list-group-item" title = "">New<span>12</span><button class = "btn btn-danger reduce">-</button></li> -->
			  </ul>
		</div>
		<div id = "total-price">
			<p >
				Total :  <span  id = "order-price"></span>
			</p>
		</div>
		<div id = "finish">
			<button type = "button" class = "btn btn-primary" id = "register">
					Register
			</button>
			<button type = "button" class = "btn btn-success" id = "order-button">
				Order
			</button>
		</div>	
	</div>
	
	
	<div id = "item-list">
		<!-- <div class = "items">
			<button type="button" onclick = "#" class = "btn btn-default item-info">
					<p class = "name">Name</p>
					<p class = "price">Price</p>
			</button>
			<div>
				<button type = "button" class = "btn btn-info item-buttons edit">
					Edit
				</button>	
				<button type = "button" class = "btn btn-danger item-buttons delete">
					Delete
				</button>
			</div>	
		</div>	 -->
	</div>

	

	<div id = "dialog-register" style = "display : none;" class  = "dialog">
		<div id = "text-group">
			<label for ="register-name">Name:</label>
			<input type = "text" id = "register-name" class ="dialog-name">
			<br/>

			<label for ="register-price">Price:</label>			
			<input type = "text" id = "register-price" class= "dialog-price">									
		</div>								
		<div id ="btn-group">		
			<button id = "register-add" class = "btn btn-success">			
				Add				
			</button>			
			<button id = "register-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>				
	</div>
	
	<div id = "dialog-edit" style = "display : none;" class  = "dialog">
		<div id = "text-group">
			<label for ="edit-name">Name:</label>
			<input type = "text" id = "edit-name" class ="dialog-name">
			<br/>

			<label for ="edit-price">Price:</label>			
			<input type = "text" id = "edit-price" class= "dialog-price">									
		</div>								
		<div id ="btn-group">		
			<button id = "edit-edit" class = "btn btn-success">			
				Edit				
			</button>			
			<button id = "edit-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>				
	</div>
	<div id = "dialog-delete"  class  = "dialog" style = "display : none;">
			<p  id = "delete-text">
				Do you want to Delete?
			</p>							
		<div id ="btn-group">		
			<button id = "delete-delete" class = "btn btn-success">			
				Delete				
			</button>			
			<button id = "delete-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>				
	</div>
	<div id = "dialog-order"  class = "dialog" style = "display : none;">
			<p id = "order-text">
				Confirm??
			</p>							
		<div id ="btn-group">		
			<button id = "order-order" class = "btn btn-success">			
				Confirm				
			</button>			
			<button id = "order-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>				
	</div>
</body>
</html>