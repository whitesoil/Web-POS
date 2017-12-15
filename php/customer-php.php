<?php
	$db = new PDO("mysql:dbname=pos", "root", "root");
	
	//init customer list
	if($_GET["type"] == "start"){
		$count = 1;
		$rows = $db->query("select * from customer");
		
		header("Content-type: application/json");

		echo "{\n  \"customer\": [\n";

		foreach($rows as $res){
			if($count == $rows->rowcount()){
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["id"] = $res["id"];
				$arr["phone"] = $res["phone"];
				echo "\t".json_encode($arr)."\n";
				$count++;
			}else{
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["id"] = $res["id"];
				$arr["phone"] = $res["phone"];
				echo "\t".json_encode($arr).",\n";
				$count++;
			}
		}
		
		echo "  ]\n}\n";
	}



	//search customer
	if($_GET["type"] == "search"){
		$name = htmlspecialchars($_GET["name"]);
		$count = 1;
		$rows = $db->query("select * from customer where name='$name'");
		
		header("Content-type: application/json");

		echo "{\n  \"customer\": [\n";

		foreach($rows as $res){
			if($count == $rows->rowcount()){
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["id"] = $res["id"];
				$arr["phone"] = $res["phone"];
				echo "\t".json_encode($arr)."\n";
				$count++;
			}else{
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["id"] = $res["id"];
				$arr["phone"] = $res["phone"];
				echo "\t".json_encode($arr).",\n";
				$count++;
			}
		}
		
		echo "  ]\n}\n";
	}

	//add customer
	if($_GET["type"] == "add-add"){
		$name = htmlspecialchars($_GET["name"]);
		$phone = htmlspecialchars($_GET["phone"]);

		$rows = $db->exec("insert into customer(name, phone) values('$name', '$phone')");
	}

	//delete customer
	if($_GET["type"] == "del-del"){
		$id = htmlspecialchars($_GET["id"]);

		$rows = $db->exec("delete from customer where id='$id'");
	}
?>