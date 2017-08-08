<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$username=$data->name;
$email=$data->email;
$phone=$data->phone;
$password=$username;
$type=$data->role;
if($type=="Reciptionist")
{
	$priority=3;
}
else
if($type=="OP")
{
	$priority=5;
}
else
if($type=="Lab")
{
	$priority=7;
}
else
if($type=="Ip/Lab")
{
	$priority=9;
}
if(isset($data->photo))
{
	$photo=$data->photo;
}
else {
	$photo="";
}

$sql="INSERT INTO users (username,email,phone,password,type,priority,photo) values( '{$username}','{$email}','{$phone}','{$password}','{$type}','{$priority}','{$photo}')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

	$select="select * from users";
	$result=mysqli_query($con,$select) or die(mysqli_error($con));
	$users=array();
	while ($row = mysqli_fetch_array($result)) {
	  $users[] = $row;
	}
	print json_encode($users);




?>

