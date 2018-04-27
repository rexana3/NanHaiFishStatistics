<?php
	header("content-type:text/html;charset=utf-8");   
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "NanHai";
	//查询 年份，季度，功率段相同的条件下已存在多少张表格
	$year = $_POST["year"];
	$ship = $_REQUEST["ship"];
	$season = $_REQUEST["season"];
	//$powerS =$_REQUEST["powerS"];
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("连接失败: " . mysqli_connect_error());
	}
	$sql0 = "SELECT id FROM record where year='$year' AND season='$season' AND ship='$ship' AND powerS='0'";
	$result0 = mysqli_query($conn, $sql0);
	$row0 = mysqli_num_rows($result0);
	
	$sql1 = "SELECT id FROM record where year='$year' AND season='$season' AND ship='$ship' AND powerS='1'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_num_rows($result1);
	
	$sql2 = "SELECT id FROM record where year='$year' AND season='$season' AND ship='$ship' AND powerS='2'";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_num_rows($result2);
	
	$sql3 = "SELECT id FROM record where year='$year' AND season='$season' AND ship='$ship' AND powerS='3'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_num_rows($result3);
	
	$sql4 = "SELECT id FROM record where year='$year' AND season='$season' AND ship='$ship' AND powerS='4'";
	$result4 = mysqli_query($conn, $sql4);
	$row4 = mysqli_num_rows($result4);
	
	$row = array(
		"0" => $row0,
		"1" => $row1,
		"2" => $row2,
		"3" => $row3,
		"4" => $row4
	);
	$jsonData = json_encode($row);
	print_r ($jsonData);
	mysqli_close($conn);
?>