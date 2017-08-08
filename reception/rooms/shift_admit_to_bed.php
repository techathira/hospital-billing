<?php
require_once("../../database.php");
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
		$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

$data = json_decode(file_get_contents("php://input"));
$bed_id=$data->bed_id;
$ward_id=$data->ward_id;
$room_id=$data->room_id;
$patient_id=$data->patient_id;


$select_insurance="select * from beds_allotment where patient_id = '{$patient_id}' and bed_id ='{$bed_id}' ";
$insurance_result=mysqli_query($con,$select_insurance) or die(mysqli_error($con));
$row=mysqli_fetch_array($insurance_result);
$insurance_id=$row['insurance_id'];




date_default_timezone_set("Asia/Calcutta");
$indate=date("Y-m-d h:i:sa");


$sql_insert="INSERT INTO beds_allotment (bed_id,ward_id,room_id,patient_id,insurance_id,from_date,admited_user_id) VALUES ('{$bed_id}','{$ward_id}','{$room_id}','{$patient_id}','{$insurance_id}','{$indate}','{$user_id}')";
$res=mysqli_query($con,$sql_insert) or die(mysqli_error($con));
$update="UPDATE beds SET status=1 WHERE bed_id='{$bed_id}' and ward_id='{$ward_id}'";
$update_result=mysqli_query($con,$update) or die(mysqli_error($con));
 /* if($payment=="pay_now")
  {
	  $sql="INSERT INTO make_payment (patient_id,date,payment_mode,amount) VALUES  ('{$bed_id}','bed','{$patient_id}','{$date_time}', '{$pay_mode}','{$amount}')";
	  $result=mysqli_query($con,$sql);
  }
  else
  {
	   $sql="INSERT INTO make_payment (des_id,des_name,patient_id,payment_date,payment_mode,amount) VALUES  ('{$bed_id}','bed','{$patient_id}','{$date_time}', '{$payment}','{$amount}')";
	  $result=mysqli_query($con,$sql);
  }*/



?>