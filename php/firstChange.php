<?php
	header("content-type:text/html;charset=utf-8");  
	$oldName = $_POST['oldName'];
	$oldWeight =$_POST['oldWeight'];
	$oldPrice = $_POST["oldPrice"];
	$newName = $_POST['fishName'];
	$newWeight = $_POST['fishWeight'];
	$newPrice = $_POST['fishPrice'];
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
	$sql = "UPDATE record_detail SET fish_name='$newName',price = '$newPrice',kg= '$newWeight'
	WHERE recor_id = '$record' AND fish_name='$oldName'  AND kg='$oldWeight'  AND price = '$oldPrice'";
	if ($connN->query($sql) === TRUE) {
	    echo "新记录插入成功";
	} else {
	    echo "记录插入错误: " . $sql . "<br>" . $connN->error;
	}
	
	$connN->close();	
	
?>