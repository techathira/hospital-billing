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
$data = json_decode(file_get_contents("php://input"));

$slot_id=mysqli_real_escape_string($con,$data->selected_slot->slot_id);
$doctor_id=mysqli_real_escape_string($con,$data->selected_slot->doctor_id);

if(isset($data->reason)){
		$reason=mysqli_real_escape_string($con,$data->reason);	
}else
{
	$reason='';
}

$apt_date=$data->apt_date;
$date_of_booking=date('Y-m-d');


$sql="insert into patient_appointment(patient_id,doctor_id,date,date_of_booking,slot_id,reason) values('{$user_id}','{$doctor_id}','{$apt_date}','{$date_of_booking}','{$slot_id}','{$reason}')";

$result = mysqli_query($con, $sql )or die(mysqli_error($con));


//if appointment is done , update slot status in slots table to 1 ("Booked") and send status
$response=[];
if($result){


		$response['status']="success";
		$response['status_code']="200";
		print json_encode($response);

}else{

        $response['status']="Unsuccess";
		$response['status_code']="404";
		print json_encode($response);

}




?>