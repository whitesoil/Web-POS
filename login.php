<?php
  //session start
  session_start();

  //load id, password from welcome.php page
  $id = htmlspecialchars($_POST["id"]);
  $password = htmlspecialchars($_POST["password"]);

  //connect DB
  $db = new PDO("mysql:dbname=pos", "root", "root");


  //check password
  $rows = $db->query("select * from user where id='$id'");
  $result = $rows->fetch(PDO::FETCH_ASSOC);

  //setting session variables needed
  if($rows->rowcount()==1){
    if(!strcmp($result["password"],$password)){
	  // set session info
	  $_SESSION["id"] = $result["id"];
	  $_SESSION["password"] = $result["password"];
	  $_SESSION["name"] = $result["name"];
	  $_SESSION["email"] = $result["email"];
      echo "<script>location.href='./order.php';</script>";
    }else{
	  session_destroy();
      echo "<script>alert('Login failed : Wrong password');location.href='./login.html';</script>";
    }
  }else{
	session_destroy();
    echo "<script>alert('Login failed: Wrong ID');location.href='./login.html';</script>";
  }
 ?>