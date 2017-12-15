<?php
	$db = new PDO("mysql:dbname=pos", "root", "root");
	
	//년도별 매출 출력
	if($_GET["type"] == "start"){
		$count = 1;
		$rows = $db->query("select date_format(date, '%Y') as year, sum(sale) as price from sales group by date_format(date, '%Y')");
		
		header("Content-type: application/json");

		echo "{\n  \"list\": [\n";

		foreach($rows as $res){
			if($count == $rows->rowcount()){
				$arr = array();
				$arr["year"] = $res["year"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr)."\n";
				$count++;
			}else{
				$arr = array();
				$arr["year"] = $res["year"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr).",\n";
				$count++;
			}
		}
		
		echo "  ]\n}\n";
	}

	//월별 매출 출력
	if($_GET["type"] == "month"){
		$month = $_GET["month"];
		$year = $_GET["year"];
		$tmp = $year.$month;
		$count = 1;
		$rows = $db->query("select date_format(date, '%d') as year, sum(sale) as price from sales where date_format(date, '%Y%m') = '$tmp' group by year order by year asc");
		
		header("Content-type: application/json");

		echo "{\n  \"list\": [\n";

		foreach($rows as $res){
			if($count == $rows->rowcount()){
				$arr = array();
				$arr["day"] = $res["year"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr)."\n";
				$count++;
			}else{
				$arr = array();
				$arr["day"] = $res["year"];
				$arr["price"] = $res["price"];
				echo "\t".json_encode($arr).",\n";
				$count++;
			}
		}
		
		echo "  ]\n}\n";
	}
?>