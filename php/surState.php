<?php
	//调查页面对比信息的数据库插入
header("content-type:text/html;charset=utf-8");
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "NanHai";
$mytable = $_POST['table'];
$year = $_POST['year'];
$myflag = $_POST['flag'];
$season = $_POST['season'];
$ship = $_POST['ship'];
$num = $_POST['num'];
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("连接失败：" .mysqli_connect_error());
}
$sql = "INSERT INTO state(mytable,myflag,year,season,ship,num)
VALUES ('{$mytable}','{$myflag}', '{$year}','{$season}','{$ship}','{$num}')";
if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "记录插入错误: " . $sql . "<br>" . $conn->error;
}	
$conn->close();
?>