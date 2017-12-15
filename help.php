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
	<link rel = "stylesheet" href = "./css/help.css">
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

</body>
</html>