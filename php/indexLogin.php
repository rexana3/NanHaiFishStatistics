<?php
	//获取信息，储存到cookie，并跳转页面，将用户信息发送到php
if(($_POST['stunum'] !=null)&& ($_POST['password']!=null)){
	$stunum=$_POST['stunum'];
	$password=$_POST['password'];
	$conn = mysqli_connect('localhost','username','password');
	mysqli_select_db($conn,'nanhai');
	$sql = "select * from usename where stunum ='$stunum'";
	$result = mysqli_query($conn,$sql);
//	echo $result;
	$row = mysqli_fetch_assoc($result);
	//判断输入的密码和数据库的密码是否一致
	if($row['password'] == $password){
		$usename = $row['usename'] ;
		setcookie('usename',$row['usename']);
		header('location:http://127.0.0.1/NanHaiFishStatistics/first_input.html' . "?usename=$usename");
	}else{
		header('location:http://127.0.0.1/NanHaiFishStatistics/index.html' . "?error=0");
	}
}
?>

