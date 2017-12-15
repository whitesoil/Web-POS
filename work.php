<?php
session_start();
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
	<script src="./js/work.js?var=1" type = "text/javascript"></script>
	<link rel = "stylesheet" href = "./css/work.css?var=1">
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
				<!-- <li class="list-group-item" title = "">New<span class="badge">12</span></li>
				<li class="list-group-item">Deleted <span class="badge">5</span></li>
				<li class="list-group-item">Warnings <span class="badge">3</span></li>
				  <li class="list-group-item" title = "">New<span class="badge">12</span></li>
				<li class="list-group-item">Deleted <span class="badge">5</span></li>
				<li class="list-group-item">Warnings <span class="badge">3</span></li>
				  <li class="list-group-item" title = "">New<span class="badge">12</span></li> -->
			  </ul>
		</div>
		<div id = "total-price">
			<p >
				Total :  <span  id = "order-price"></span>
			</p>
		</div>
		<div id = "finish">
			<button type = "button" onclick="#" class = "btn btn-success" id = "finish_button">
				Finish
			</button>
	</div>	
</div>
<div id = "item-list">
		<!-- <div class = "orders">
			<button type="button" onclick="#" class="btn btn-default order-info">
				<div class = "container">
					<h3 class = "name">Name</h3>
					<span style = "display : none;"></span>
					<ul>
						<li><span>Item</span><span> : </span><span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>	
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>	
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>
						<li><span>Item</span> : <span>Number</span> </li>	
					</ul>	
				</div>
			</button>
			<div>
				<button type = "button" class = "btn btn-danger item-buttons" id="delete">
					Delete
				</button>
			</div>	
		</div>	 -->
</div>
	<div id = "dialog-delete"  class  = "dialog" style = "display : none;">
		<p  id = "delete-text">
			Do you want delete?
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
	<div id = "dialog-finish"  class  = "dialog" style = "display : none;">
		<p  id = "finish-text">
			Is this finished???
		</p>							
		<div id ="btn-group">		
			<button id = "finish-finish" class = "btn btn-success">			
				Finish				
			</button>			
			<button id = "finish-cancel" class = "btn btn-danger">			
				Cancel				
			</button>			
		</div>				
	</div>
</body>
</html>