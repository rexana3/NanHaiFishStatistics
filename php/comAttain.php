<?php
	header("content-type:text/html;charset=utf-8");   
//接收数据,对比数据
	//获取表格数据
	$ship = $_POST["ship"];
	$powerS =$_POST["powerS"];
	$year =$_POST["year"];
	$season = $_POST["season"];
//连接数据库
	//不在此处进行数据库的创建，数据库应只创建一次。   
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "NanHai";
	
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}else{
//		echo "连接成功";
	}
	$flag= false;
	//获取第一张表格中对应的数据
	$sql = "SELECT table_id FROM record where year='$year' AND season='$season' AND powerS='$powerS'";
	$result2 = $conn->query($sql);
	
//	$result = $conn->query($sql);
	if ($result2->num_rows > 0) {
		$num=0;
		for($i=0;($row = $result2->fetch_assoc());$i++){
			$num = $num+1;	
		}
		echo $num;
	} else {
	    echo "0 结果";
	}
	$conn->close();
?>