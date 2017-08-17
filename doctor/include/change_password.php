<?php
session_start();
require_once("../../database.php");

if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
	$data = json_decode(file_get_contents("php://input"));
	$user_id=$_SESSION['user_id'];
	$old=$data->old;
	$newpassword=$data->newpassword;
	$reenter=$data->reenter;
	$sql="update doctors set password = '{$newpassword}' where doctor_id= '{$user_id}' and password='{$old}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>=1){
		print json_encode(1);
	} else{
		print json_encode(0);
	}
}
else{
	header('Location: ../login/index.html');
	die();	
}

//print json_encode($send);
?>