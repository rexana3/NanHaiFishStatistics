<?php
header("content-type:text/html;charset=utf-8");   
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "NanHai";
//查询 年份，季度，功率段相同的条件下已存在多少张表格
$year = $_REQUEST["year"];
$powerS = $_REQUEST["powerSection"];
$season = $_REQUEST["season"];
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "SELECT id FROM record where year='$year' AND season='$season' AND powerS='$powerS'";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
echo $row;
mysqli_close($conn);
?>