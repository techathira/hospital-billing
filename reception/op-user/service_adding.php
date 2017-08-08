<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
//$patient_id[]=$data[1]->patient_id;
date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$i=0;
do
{
$service_id[]=$data->service[$i]->service_id;
$price[]=$data->service[$i]->price;

//$patient_id[]=$data[$i]->patient_id;


 $sql="INSERT INTO op_service_taken (patient_id,service_id,date,amount) VALUES  ('{$patient_id}','{$service_id[$i]}','{$currdate}','{$price[$i]}')";
	  $result=mysqli_query($con,$sql);
$i++;
}
while($i<sizeof($data->service));


$sql1="SELECT oc.patient_id as patient_id,CONCAT('Consultation fees',' ',d.doctor_name) as description,COUNT(oc.patient_id) as quantity,oc.amount as amount,amount * COUNT(oc.patient_id) as total FROM op_consultation oc,doctors d WHERE oc.patient_id IS NOT NULL AND oc.consulted_date='{$currdate}' and  oc.flag=0 and oc.patient_id ='{$patient_id}' and oc.doctor_id=d.doctor_id GROUP BY oc.patient_id,d.doctor_id UNION select os.patient_id as patient_id,s.service_name as description,COUNT(os.service_id) as quantity,os.amount as amount,amount * COUNT(os.service_id) as total from op_service_taken os,services s where os.patient_id='{$patient_id}' and os.date = '{$currdate}' and os.service_id=s.service_id GROUP by os.service_id,os.amount ";
$data=array();
  $result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($result1)){
	  $data[]=$row;
  }
  print json_encode($data);
?>