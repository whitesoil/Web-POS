<?php
	$db = new PDO("mysql:dbname=pos", "root", "root");
	
	//리스트 처리
	if($_GET["type"] == "start"){
		$count = 1;
		$rows = $db->query("select * from item");
		
		header("Content-type: application/json");

		echo "{\n  \"info\": [\n";

		foreach($rows as $res){
			if($count == $rows->rowcount()){
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr)."\n";
				$count++;
			}else{
				$arr = array();
				$arr["name"] = $res["name"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr).",\n";
				$count++;
			}
		}
		
		echo "  ]\n}\n";
	}
	

	//메뉴추가
	if($_GET["type"] == "register-add"){
		$name = htmlspecialchars($_GET["name"]);
		$price = htmlspecialchars($_GET["price"]);
		
		$rows = $db->exec("insert into item(name, price) values('$name', $price)");
		
		header("Content-type: application/json");

		echo "{\n  \"info\": [\n";

		$arr = array();
		$arr["name"] = $_GET["name"];
		$arr["price"] = $_GET["price"];
			
		echo "\t".json_encode($arr)."\n";
		
		echo "  ]\n}\n";
	}

	
	// //고객 정보 검색
	if($_GET["type"] == "find-cus"){
		// $phone = htmlspecialchars($_GET["phone"]);
		$phone = $_GET["phone"];
		
		$rows = $db->query("select * from customer where phone='$phone'");
		
		if($rows->rowcount() == 0){
			header("Content-type: application/json");

			echo "{\n  \"info\": [\n";

			$arr = array();
			$arr["name"] = "No Result!";
			$arr["phone"] = "No Result!";

			echo "\t".json_encode($arr)."\n";

			echo "  ]\n}\n";
		}else{
			header("Content-type: application/json");

			echo "{\n  \"info\": [\n";
			
			$arr = array();
			foreach($rows as $res){
			$arr["name"] = $res["name"];
			$arr["phone"] = $res["phone"];
			}

			echo "\t".json_encode($arr)."\n";

			echo "  ]\n}\n";
		}
	}
	
	
	//Delete item
	if($_GET["type"] == "delete"){
		$name = $_GET["name"];
		$rows = $db->exec("delete from item where name='$name'");
	}
	
	//Order item
	if($_GET["type"] == "order"){
		$phone = $_GET['phone'];
		$obj = json_decode($_GET['list'], true);
		
		$rows1 = $db->query("select * from customer where phone='$phone'");
		foreach($rows1 as $r){
			$cid = $r["id"];
		}
		
		$count = 0;
		foreach($obj as $res){
			for($i = 0 ; $i < count($res['data']) ; $i++){
				$name = $res['data'][$count]['name'];
			$amount = $res['data'][$count]['amount'];	
			$rows2 = $db->exec("insert into work (id, item, amount) values($cid,'$name',$amount)");
			$count++;
			}
			
		}
		
	}

	//edit item;
	if($_GET["type"] == "edit"){
		$past = $_GET["past"];
		$name = $_GET["name"];
		$price = $_GET["price"];
		
		$rows = $db->exec("update item set name='$name', price=$price where name='$past'");
		
		header("Content-type: application/json");

			echo "{\n  \"info\": [\n";
			
			$arr = array();

				$arr["name"] = $name;
				$arr["price"] = $price;
				echo "\t".json_encode($arr)."\n";
			


			echo "  ]\n}\n";
	}
?>