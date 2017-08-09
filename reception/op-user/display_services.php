<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$data1=array();
if(isset($data->patient_id))
{
$patient_id=$data->patient_id;
$check="select * from patient_registration where patient_id= '{$patient_id}' or phone='{$patient_id}'";
$res=mysqli_query($con,$check) or die(mysqli_error($con));

$check1="select patient_id from patient_registration where patient_id= '{$patient_id}' or phone='{$patient_id}'";
$res1=mysqli_query($con,$check1) or die(mysqli_error($con));
$acutalrow=mysqli_fetch_array($res1);
$actual_id=$acutalrow['patient_id'];

if(mysqli_num_rows($res)>=1) {
date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$sql1="SELECT oc.patient_id as patient_id,CONCAT('Consultation fees',' ',d.doctor_name) as description,COUNT(oc.patient_id) as quantity,oc.amount as amount,amount * COUNT(oc.patient_id) as total FROM op_consultation oc,doctors d,patient_registration p WHERE oc.patient_id IS NOT NULL AND oc.consulted_date='{$currdate}' and oc.patient_id=p.patient_id AND oc.patient_id ='{$actual_id}' and oc.flag=0 and oc.doctor_id=d.doctor_id GROUP BY oc.patient_id,d.doctor_id UNION select os.patient_id as patient_id,s.service_name as description,COUNT(os.service_id) as quantity,os.amount as amount,amount * COUNT(os.service_id) as total from op_service_taken os,services s,patient_registration p where os.patient_id=p.patient_id AND os.patient_id='{$actual_id}' and os.date = '{$currdate}' and os.service_id=s.service_id GROUP by os.service_id,os.amount ";

  $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($result1)){
	  $data1[]=$row;
  }
  print json_encode($data1);
  }
  else{
  
    $data1['Error']="404";
       print json_encode($data1);
  
  }
  
 
} 
  else
  {
      $data1['Error']="405";
       print json_encode($data1); 
      
  }
  
?>

