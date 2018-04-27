<?php
header("content-type:text/html;charset=utf-8");   
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "NanHai";
$mytable =  $_REQUEST["mytable"];
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "SELECT * FROM state where mytable='$mytable'";

$result = mysqli_query($conn, $sql);
//if (mysqli_num_rows($result) > 0) {
//  while($row = mysqli_fetch_assoc($result)) {
//  	//这样子输出是错误的
//		$json = json_encode($row, JSON_UNESCAPED_UNICODE);//JSON_UNESCAPED_UNICODE解决中文乱码
//		echo $json;[][][][][] 少了，，，
//  }
//} else {
//  echo "0 结果";
//}
//--------------------------------
//class data{
//	public $id;
//	public $myflag;
//	public $year;
//	public $season;	
//	public $ship;
//
//}

//if(mysqli_num_rows($result)>0){
//	$Data = new data();
//	while($row =mysqli_fetch_assoc($result)){
//		if($row["id"]!=1){
//			$Data = new data();
//			$Data->id = $i;
//			$Data->myflag = $row["myflag"];
//			$Data->year = $row["year"];
//			$Data->season = $row["season"];
//			$Data->ship = $row["ship"];
//			$dataArr[] = $Data;
//		}
//	}else{
//		echo "0结果";
//	}
//
//}
//$jsonArr = array(
//	"data" =>$dataArr
//);
//$json = json_encode($jsonArr,JSON_UNESCAPED_UNICODE);
//echo $json;
//----------------------
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		$data[] =$row;
    }
} else {
    echo "0 结果";
}	
echo json_encode($data,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>