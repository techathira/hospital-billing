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

$response=[];
if(isset($user_id)){
	

	$sql="SELECT p.patient_name,p.dob,d.doctor_name,pa.date,pa.reason,pa.appointment_id from patient_registration p,patient_appointment pa,doctors d where d.doctor_id=pa.doctor_id and pa.patient_id=p.patient_id and p.patient_id='{$user_id}' and pa.checkup_status=1 ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	if($res){

          while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
					$send[]=$row;
			}

			$response['history']=$send;
			$response['status_code']=200;
			$response['statusText']="success";
			print json_encode($response);
	}
	else{

		    $response['status_code']=404;
			$response['statusText']="unsuccessfull";
			print json_encode($response);
	}

}

?>