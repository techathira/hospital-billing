<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$user_id=$data->user_id;
$phone=$data->phone;
$type=$data->type;

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

$sql="update users set phone='{$phone}',type='{$type}',priority='{$priority}' where user_id='{$user_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	$sql="select * from users";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$users=array();
	while ($row = mysqli_fetch_array($res)) {
	  $users[] = $row;
	}
	print json_encode($users);
}
else
{
	$send="Previus details not Updated!!";
	print json_encode($send);
}
?>