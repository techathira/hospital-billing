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
for($i=0;$i<sizeof($data);$i++)
{
$service_id[]=$data[$i]->service_id;
$price[]=$data[$i]->price;
$patient_id[]=$data[$i]->patient_id;

date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");


 $sql="INSERT INTO service_taken (patient_id,service_id,curr_date,amount,user_id) VALUES  ('{$patient_id[$i]}','{$service_id[$i]}','{$currdate}','{$price[$i]}','{$user_id}')";
	  $result=mysqli_query($con,$sql);
}
?>