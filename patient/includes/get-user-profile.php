<?php

session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="patient")
{
	$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

require_once("../../database.php");
$sql="select * from patient_registration where patient_id='{$user_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$profiles=array();

$row=mysqli_fetch_array($res);
	$profiles['personal']['patient_id']=$row['patient_id'];
	$profiles['personal']['patient_name']=$row['patient_name'];
	$profiles['personal']['email']=$row['email'];
	$profiles['personal']['dob']=$row['dob'];
	$profiles['personal']['age']=$row['age'];
	$profiles['personal']['address']=$row['address'];
	$profiles['personal']['phone']=$row['phone'];
	$profiles['personal']['profile_pic']=$row['photo'];


$sql2="select * from patient_registration where phone='{$row["phone"]}' and patient_id != '{$user_id}'";
$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));

while($row=mysqli_fetch_array($res2))
{
	$profiles['associated'][]=$row;
}


print json_encode($profiles);

?>