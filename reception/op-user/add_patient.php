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
	$name=$data->patient_name;
	if(isset($data->date_of_birth))
	$dob=$data->date_of_birth;
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
	

   $phonesql="select phone from patient_registration where phone='{$phone}'";
   $phoneres=mysqli_query($con,$phonesql) or die(mysqli_error($con));
  
	//insert
	$sql="insert into patient_registration ( patient_name, phone, email, dob, age, gender, address,user_id) values('{$name}','{$phone}','{$email}','{$dob}','{$age}','{$gender}','{$address}','{$user_id}')";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	

	
	//select id	
	$sql="select patient_id from patient_registration where phone = '{$phone}' ORDER BY patient_id DESC LIMIT 1";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$row=mysqli_fetch_array($res);
	
	$actual_id=$row['patient_id'];
	$id="PATIENT-".$row['patient_id'];
	


	//include "test_barcode.php"; 

	// set Barcode39 object 
	//$bc = new Barcode39($id); 

	// display new barcode 
	$barcode="Blob data";

	$update="update patient_registration set barcode_reader= '{$id}' where patient_id='{$actual_id}' ";


	$result=mysqli_query($con,$update) or die(mysqli_error($con));

	
	$sql="select * from patient_registration where patient_id ='{$actual_id}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));

	$row=mysqli_fetch_array($res);
	$resultdata['patient_id']=$row['patient_id'];
	
	
	print json_encode($resultdata);
	

?>


