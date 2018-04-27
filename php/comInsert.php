<?php
	header("content-type:text/html;charset=utf-8");   
//接收数据,对比数据
	//获取表格数据
	$ship = $_POST["ship"];
	$powerS =$_POST["powerS"];
	$year =$_POST["year"];
	$season = $_POST["season"];
	$power =$_POST["fishPower"];
	$output = $_POST["allput"]; //总产量
	$allvalue = $_POST["value"]; //总产值
	$workday =$_POST["workday"];
	$fisharea = $_POST["area"];
//	$surveyName = $_POST["myName"];
	$formName = $_POST['name'];
	$start =$_POST['start'];
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
	$sql = "SELECT ship,kg,output,days,fish_zone,power FROM record where year='$year' AND season='$season' AND powerS='$powerS' limit {$start},1";
	$result2 = $conn->query($sql);
	
//	$result = $conn->query($sql);
	if ($result2->num_rows > 0) {
		for($i=0;($row = $result2->fetch_assoc());$i++){
//			echo "第二次的数据" . $power;
			
			if($power == $row['power'] && $allvalue == $row['output'] &&  $output== $row['kg'] && $fisharea == $row['fish_zone'] && $workday == $row['days'] ){
				echo $flag;
			}else{
				echo $start;
			}
		}
	} else {
	    echo "0 结果";
	}
	$conn->close();
?>