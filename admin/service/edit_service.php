<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$service_id=$data->service_id;

$sql="select * from services where service_id= '{$service_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$service=array();
while ($row = mysqli_fetch_array($res)) {
  $service['service_id'] = $row['service_id'];
  $service['service_name'] = $row['service_name'];
  $service['price'] = $row['price'];
}
print json_encode($service);
?>