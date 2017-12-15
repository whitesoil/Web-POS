<?php
	// echo "asdf";
  	$email = htmlspecialchars($_POST['email']);
 	$password = htmlspecialchars($_POST['password']);
	$name = htmlspecialchars($_POST['name']);
	$id = htmlspecialchars($_POST['id']);

	if(empty($email)||empty($password)||empty($name)||empty($id)){
		
		echo("<script>alert('Fill the empty space!')</script>");
		echo("<script>location.href='./register.html';</script>");
	}else{
	
	  	//connect DB
	  	$db = new PDO("mysql:dbname=pos", "root", "root");

		$check = $db->query("select id from user where id='$id'");
		if($check->rowcount() == 1){
			echo("<script>location.href='./register.html';
					alert('ID already exist!!');</script>");
		}else{
		  $rows=$db->exec("insert into user values('$id','$password','$email','$name')");
			// $rows=$db->exec("insert into user values('asdf','eee','eee','dee')");

			echo("<script>alert('Register success!');location.href='./login.html';</script>");
		}
	}
?>