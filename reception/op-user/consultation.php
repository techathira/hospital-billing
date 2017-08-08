<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->patient_id;

$sql="select * from patient_registration where patient_id = '{$patient_id}' or phone='{$patient_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($res);
$data=array();
$data['patient_name']=$row['patient_name'];
$data['patient_id']=$row['patient_id'];
$data['gender']=$row['gender'];
$data['phone']=$row['phone'];
$data['age']=$row['age'];
print json_encode($data);
?>