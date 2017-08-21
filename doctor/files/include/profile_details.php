<?php
session_start();
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
$user_id = $_SESSION['user_id'];
	$sql="select * from doctors where doctor_id='{$user_id}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$send=$row;
	}
print json_encode($send);
}
else{
	die();	
}
?>