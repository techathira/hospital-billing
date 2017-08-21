<?php 
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="patient")
{
	$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}


$patient_email = $data->patient_details->email;
$patient_name = $data->patient_details->patient_name;
$patient_address = $data->patient_details->address;

$sql2="update patient_registration set patient_name='{$patient_name}', address='{$patient_address}',email='{$patient_email}' where patient_id='{$user_id}'";
$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));

$profiles=array();
	if($res2){

			$sql="select * from patient_registration where patient_id='{$user_id}'";
			$res=mysqli_query($con,$sql) or die(mysqli_error($con));
			
			$row=mysqli_fetch_array($res);
			$profiles['personal']['patient_id']=$row['patient_id'];
			$profiles['personal']['patient_name']=$row['patient_name'];
			$profiles['personal']['email']=$row['email'];
			$profiles['personal']['dob']=$row['dob'];
			$profiles['personal']['age']=$row['age'];
			$profiles['personal']['address']=$row['address'];
			$profiles['personal']['phone']=$row['phone'];
            header("HTTP/1.1 200 OK");
	}

print json_encode($profiles);

?>