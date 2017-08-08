<?php

session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
		$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

	require_once("../../database.php");
	$data = json_decode(file_get_contents("php://input"));
	$id=$data->patient_id;
	$name=$data->patient_name;
	if(isset($data->dob))
	$dob=$data->dob;
	else
	$dob="";
	
	if(isset($data->email))
	$email=$data->email;
	else
	$email="";
	
	
	
	$phone=$data->phone;
	$age=$data->age;
	$gender=$data->gender;
	$address=$data->address;
   	$resultdata=array();
	

   
  
	//insert
	$sql="UPDATE patient_registration SET patient_name='{$name}',email='{$email}',dob='{$dob}',age='{$age}',gender='{$gender}',address='{$address}',user_id='{$user_id}' WHERE patient_id='{$id}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	

	
	
	

?>


