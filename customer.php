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
	<script src="./js/customer.js?var=2" type = "text/javascript"></script>
	<link rel = "stylesheet" href = "./css/cus.css">
	<link rel = "stylesheet" href = "./css/dialog.css?ver=1">
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
	
	
	
	<div id = "customer">
		<input placeholder = "Name" id = "name" maxlength = "10">
		<button class = "btn btn-success" type = "button" onclick="#" id="search">SEARCH</button>
		<button class = "btn btn-primary" type = "button" onclick="#" id="add">Add</button>
	</div>
		
	<div id = "customer-list">
		<div id = "custom">
			<button class = "btn btn-danger" type = "button" onclick="#" id="del2">Delete</button>
			<!-- <button type = "button" onclick="#" id="edit">Edit</button> -->
		</div>
		<table class="table table-striped" id="table">
			<tr><th>ID</th><th>NAME</th><th>PHONE</th></tr>
			<!-- <tr><td>ID</td><td>NAME</td><td>PHONE</td></tr> -->
		</table>
		
	</div>
	<div id = "dialog-del" style = "display : none;" class  = "dialog">
		<div id = "text-group">
			<label for ="del-id">Customer's ID:</label>
			<input type = "text" id = "del-id" class ="dialog-name">
			<br/>						
		</div>								
		<div id ="btn-group">		
			<button id = "del-del" class = "btn btn-success">			
				Delete				
			</button>			
			<button id = "del-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>		
	</div>
	
	<div id = "dialog-add" style = "display : none;" class  = "dialog">
		<div id = "text-group">
			<label for ="add-name">Name:</label>
			<input type = "text" id = "add-name" class ="dialog-name">
			<br/>

			<label for ="add-phone">phone:</label>			
			<input type = "text" id = "add-phone" class= "dialog-price">									
		</div>								
		<div id ="btn-group">		
			<button id = "add-add" class = "btn btn-success">			
				Add				
			</button>			
			<button id = "add-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>		
	</div>
</body>
</html>