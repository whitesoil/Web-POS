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
		<script src="./js/sales.js?var=3" type = "text/javascript"></script>
	<link rel = "stylesheet" href = "./css/sales.css">
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
	
		
<div class = "lists" id = "month">
	<h1>
		Month
	</h1>
	
 	<!--<input type="date" name="daymonth" id = "DateMonth" size="15">-->
	
	<select name="year" id = "years">
		<optgroup label="YEARS">
		<option>2017</option>
		<option>2018</option>
		<option>2019</option>
		<option>2020</option>
		<option>2021</option>
		<option>2022</option>
		<option>2023</option>
		<option>2024</option>
		<option>2025</option>
		<option>2026</option>
		<option>2027</option>
		<option>2028</option>
	</select>	
	<select name = "month" id="months">
 	 	<optgroup label="MONTHS">
		<option>January</option>
		<option>February</option>
		<option>March</option>
		<option>April</option>
		<option>May</option>
		<option>June</option>
		<option>July</option>
		<option>August</option>
		<option>September</option>
		<option>October</option>
		<option>November</option>
		<option>December</option>
	</select>
	
	<button class = "btn btn-success" type="submit" onclick="#" id= "searchMonth">Search</button>
	<div style = "margin-top : 20px; height : 85%; overflow : auto; border : 1px solid black;">
			<ul class="list-group" id = "monthList">
				<!-- <li class="list-group-item"><span>HI</span> : <span class="badge">5</span></li> -->
		  </ul>
	</div>
</div>

<div class = "lists" id = "year" >
	<h1>
		Year
	</h1>
 	<div style = "margin-top : 20px; height : 90%; overflow : auto; border : 1px solid black;">
			<ul class="list-group" id = "yearList">
				<!-- <li class="list-group-item"><span>HI</span> : <span class="badge">5</span></li> -->
		  </ul>
	</div>
</div>

</body>
</html>