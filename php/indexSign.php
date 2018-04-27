<?php
	//注册界面
	header("content-type:text/html;charset=utf-8");   
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "NanHai";
	//查询 年份，季度，功率段相同的条件下已存在多少张表格
	$myname = $_POST["usename"]; //姓名
	$myword = $_REQUEST["password"]; //密码
	$stunum = $_REQUEST['stunum']; //学号
	$idcard = $_REQUEST['idcard']; //身份证
	$class = $_REQUEST['class']; //班级
	$tel = $_REQUEST['tel']; //电话
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("连接失败: " . mysqli_connect_error());
	}
	$sql = "SELECT id FROM stunum where stunum='$stunum'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($result);
	if($row>0){
		echo "已存在该用户";
	}
	else{
		$sqlo = "INSERT INTO usename(stunum,usename,password,idcard,class,tel)
		VALUES ('{$stunum}', '{$myname}', '{$myword}', '{$idcard}', '{$class}', '{$tel}')";
		if ($conn->query($sqlo) === TRUE) {
	//	    echo "注册成功，请登录";
			setcookie('usename',$myname);
		} else {
		    echo "出错了，请重新尝试";
		}
	}
	mysqli_close($conn);
?>