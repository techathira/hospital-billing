<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$doctor_id=$data->doctor__id;

$sql="select * from doctors where doctor_id= '{$doctor_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$doctor=array();
$row = mysqli_fetch_array($res);
  $doctor['doctor_id'] = $row['doctor_id'];
  $doctor['doctor_name'] = $row['doctor_name'];
  $doctor['email'] = $row['email'];
  $doctor['phone'] = $row['phone'];
  $doctor['age'] = $row['age'];
  $doctor['gender'] = $row['gender'];
  $doctor['specialization'] = $row['specialization'];
  $doctor['experience'] = $row['experience'];
  $doctor['fee'] = $row['fee'];

print json_encode($doctor);
?>