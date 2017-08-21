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

$patient_id = $data->patient_id; 
$sql="select * from patient_registration where patient_id='{$patient_id}'";

$status=[];
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));

		if(mysqli_num_rows($res)>=1)
		{
			$row=mysqli_fetch_array($res);
			$_SESSION['name']="patient";
			$_SESSION['user_id']=$row['patient_id'];
			$status['status_code']= "200";
			$status['redirect_to']= "../patient/user-profile.php";	
			header("HTTP/1.1 200 OK");
			print json_encode($status);
           
		}
		else{
           $status['status_code']= "404";

           header("HTTP/1.1 404 Not Done");
             print json_encode($status);
            
		}


?>