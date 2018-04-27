<?php
	header("content-type:text/html;charset=utf-8");  
	$formName = $_POST["formName"];
	$tableID = $_POST["tableID"];
	$year =$_POST["year"];
	$season = $_POST["season"];
	$power =$_POST["power"];
	$powerSection = $_POST["powerSection"];
	$surveyTime =$_POST["surveyTime"];
	$surveyName = $_POST["surveyName"];
//	$card= $_POST["card"];
	$output =$_POST["output"];
	$value = $_POST["value"];
	$workday = $_POST["workday"];
	$fishArea = $_POST["fishArea"];
	$ship =$_POST["ship"];
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname ="NanHai";
	// 创建连接
	$connN = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($connN->connect_error) {
	    die("连接失败: " . $connN->connect_error);
	}else{
//		echo "连接成功";
	}
	$sqlo = "INSERT INTO record(num,table_id,year,season,powerS,sdat,recoder,kg,output,days,fish_zone,ship,power)
	VALUES ('{$formName}','{$tableID}','{$year}', '{$season}','{$powerSection}','{$surveyTime}','{$surveyName}','{$output}','{$value}','{$workday}','{$fishArea}','{$ship}','{$power}')";

	if ($connN->query($sqlo) === TRUE) {
//	    echo "新记录插入成功";
	} else {
	    echo "记录插入错误: " . $sqlo . "<br>" . $connN->error;
	}	
	$id = mysqli_insert_id($connN);
	echo $id;
	
//	$sql = "INSERT INTO ship(type_id,power_id,name)
//	VALUES ('{$id}','{$power}','{$ship}')";
//	if ($connN->query($sql) === TRUE) {
////	    echo "新记录插入成功";
//	} else {
//	    echo "记录插入错误: " . $sql . "<br>" . $connN->error;
//	}
	$connN->close();	
	
?>