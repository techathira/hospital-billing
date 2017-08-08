<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$doctor_id=$data->doctor_id;
date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$sql="select * from doctors where doctor_id = '{$doctor_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($res);
$data=array();
$data['doctor_name']=$row['doctor_name'];
$data['specialization']=$row['specialization'];
$data['fee']=$row['fee'];
$data['curr_date']=currdate;
print json_encode($data);
?>