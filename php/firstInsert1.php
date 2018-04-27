<?php
	header("content-type:text/html;charset=utf-8");  
	$fishName = $_POST['fishName'];
	$fishWeight =$_POST['fishWeight'];
	$fishPrice = $_POST["fishPrice"];
	$record = $_POST["record"];
	
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
		echo "连接成功";
	}
	$sqlo = "INSERT INTO record_detail(recor_id,fish_name,kg,price)
	VALUES ('{$record}','{$fishName}', '{$fishWeight}','{$fishPrice}')";
	if ($connN->query($sqlo) === TRUE) {
	    echo "新记录插入成功";
	} else {
	    echo "记录插入错误: " . $sqlo . "<br>" . $connN->error;
	}	
	$connN->close();	
	
?>