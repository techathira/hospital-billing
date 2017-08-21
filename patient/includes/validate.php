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
if(isset($_GET['oldpassword'])){

$old_pass=mysqli_real_escape_string($con,$_GET['oldpassword']);
$response=[];
$sql="select * from patient_registration where password = '{$old_pass}' and patient_id= '{$user_id}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>=1){
       
       $response['isValid']=true;

	}else{
		$response['isValid']=false;
	}

	print json_encode($response);

}


?>