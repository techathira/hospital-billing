<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$doctor_id=$data->doctor_id;

$sql="delete from doctors where doctor_id= '{$doctor_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$doctor=array();
$sql="select * from doctors";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
  $doctor[] = $row;
}
print json_encode($doctor);


?>