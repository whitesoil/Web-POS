<?php
	$db = new PDO("mysql:dbname=pos", "root", "root");


	if($_GET["type"] == "start"){
		
		
		$rows1 = $db->query("select distinct id from work");
		$name = array();
		$temp_name;
		$temp_phone;
		foreach($rows1 as $res){
			array_push($name,$res["id"]);
		}
		
		//col => name, item, amount, price
		header("Content-type: application/json");

		echo "{\n  \"info\": [\n";
		

		for($i = 0 ;$i < count($name) ; $i++){
			if($i == count($name)-1){
				$rows2 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$name[$i] group by i.name");
				$rows3 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$name[$i] group by i.name");
			foreach($rows2 as $res3){
				$temp_name = $res3["name"];
				$temp_phone = $res3["phone"];
				$temp_id = $res3["id"];
			}
			echo "{\n \"name\" : \"$temp_name\",\n";
			echo "\"phone\" : \"$temp_phone\",\n";
			echo "\"id\" : $temp_id,\n";
			echo "\"list\" : [";
					$count=1;
					foreach($rows3 as $res2){
						if($count==$rows3->rowcount() && $i==count($name)-1){
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr)."\n";
							$count++;
						}else{
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr).",\n";
							$count++;
						}
					}
			echo "]\n}";
				
				
			}else{
				
				
				$rows2 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$name[$i] group by i.name");	
				$rows3 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$name[$i] group by i.name");
			foreach($rows2 as $res3){
				$temp_name = $res3["name"];
				$temp_phone = $res3["phone"];
				$temp_id = $res3["id"];
			}
			echo "{\n \"name\" : \"$temp_name\",\n";
			echo "\"phone\" : \"$temp_phone\",\n";
			echo "\"id\" : $temp_id,\n";
			echo "\"list\" : [";
					$count=1;
					foreach($rows3 as $res2){
						if($count==$rows3->rowcount()){
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr)."\n";
							$count++;
						}else{
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr).",\n";
							$count++;
						}
					}
			echo "]\n},";
			}

		}
		echo "  ]\n}\n";
		
	}

	if($_GET["type"] == "delete"){
		$id = $_GET["id"];
		$rows = $db->exec("delete from work where id=$id");
	}

	if($_GET["type"] == "list"){
		$id = $_GET["id"];
		
		header("Content-type: application/json");

		echo "{\n  \"info\": [\n";
		
		$rows2 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$id group by i.name");
				$rows3 = $db->query("select c.id, c.name, c.phone, i.name as item, sum(amount) as amount ,i.price from (customer c natural join work w) join item i on i.name = w.item where c.id=$id group by i.name");
			foreach($rows2 as $res3){
				$temp_name = $res3["name"];
				$temp_phone = $res3["phone"];
				$temp_id = $res3["id"];
			}
			echo "{\n \"name\" : \"$temp_name\",\n";
			echo "\"phone\" : \"$temp_phone\",\n";
			echo "\"id\" : $temp_id,\n";
			echo "\"list\" : [";
					$count=1;
					foreach($rows3 as $res2){
						if($count==$rows3->rowcount()){
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr)."\n";
							$count++;
						}else{
							$arr = array();
							$arr["cname"]=$res2["name"];
							$arr["iname"]=$res2["item"];
							$arr["amount"]=$res2["amount"];
							$arr["price"] = $res2["price"];
							echo "\t".json_encode($arr).",\n";
							$count++;
						}
					}
			echo "]\n}";
		
		echo "  ]\n}\n";
	}

	if($_GET["type"] == "finish"){
		$price = $_GET["price"];
		$id = $_GET["id"];
		
		$rows = $db->exec("delete from work where id=$id");
		$rows2 = $db->exec("insert into sales (id, sale) values($id,$price)");
	}
?>