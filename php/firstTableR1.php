<?php
header("content-type:text/html;charset=utf-8");   
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "NanHai";
//$record =  $_POST["record"];
//发送数据可以在table里面的where进行
$record = $_GET["record"];
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "SELECT id, fish_name, kg, price FROM record_detail where recor_id ='$record'";
$result = mysqli_query($conn, $sql);
$i = 1;
//echo $result;
class data{
	public $id;
	public $fishName;
	public $fishWeight;
	public $fishPrice;
} 
$dataArr = array();
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    $Data = new data();
    $Data->code = 0;
    $Data->msg ="";
    while($row = mysqli_fetch_assoc($result)) {
    	if($row["id"] !=1){
	        $Data = new data();
	        $Data->id = $i;
	        $Data->fishName = $row["fish_name"];
	        $Data->fishWeight = $row["kg"];
	        $Data->fishPrice = $row["price"];
	        $dataArr[] = $Data;    
	        $i = $i+1;	
    	}
    }
} else {
    echo "0 结果";
}
$jsonArr = array(
	"code" => 0,
	"msg" =>"",
	"count" => $i,
	"data" =>$dataArr
);
$json = json_encode($jsonArr, JSON_UNESCAPED_UNICODE);//JSON_UNESCAPED_UNICODE解决中文乱码
echo "$json";
mysqli_close($conn);
?>