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

$doctor_id=$data->doctor_id;
$patient_id=$data->patient_id;
$fee=$data->fee;

date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$currtime=date("h:m:sa");
$sql="insert into op_consultation(patient_id,doctor_id,consulted_date,time,amount,user_id) values('{$patient_id}','{$doctor_id}','{$currdate}','{$currtime}','{$fee}','{$user_id}')";
mysqli_query($con,$sql) or die(mysqli_error($con));

$sql1="SELECT oc.patient_id as patient_id,CONCAT('Consultation fees',' ',d.doctor_name) as description,COUNT(oc.patient_id) as quantity,oc.amount as amount,amount * COUNT(oc.patient_id) as total FROM op_consultation oc,doctors d WHERE oc.patient_id IS NOT NULL AND oc.consulted_date='{$currdate}' and oc.patient_id ='{$patient_id}' and oc.flag=0 and oc.doctor_id=d.doctor_id GROUP BY oc.patient_id,d.doctor_id UNION select os.patient_id as patient_id,s.service_name as description,COUNT(os.service_id) as quantity,os.amount as amount,amount * COUNT(os.service_id) as total from op_service_taken os,services s where os.patient_id='{$patient_id}' and os.date = '{$currdate}' and os.service_id=s.service_id GROUP by os.service_id,os.amount ";
$data=array();
  $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($result1)){
	  $data[]=$row;
  }
  print json_encode($data);
  
?>