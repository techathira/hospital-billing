<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$insurance_id=$data->insurance_id;

$sql="select * from insurance where insurance_id= '{$insurance_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$insurance=array();
$row = mysqli_fetch_array($res);
  $insurance['insurance_id'] = $row['insurance_id'];
  $insurance['company_id'] = $row['company_id'];
  $insurance['company_name'] = $row['company_name'];
  $insurance['email'] = $row['email'];
  $insurance['address'] = $row['address'];
  $insurance['city'] = $row['city'];
  $insurance['state'] = $row['state'];
  $insurance['country'] = $row['country'];
  $insurance['zip'] = $row['zip'];
  $insurance['phone'] = $row['phone'];
  $insurance['fax'] = $row['fax'];

print json_encode($insurance);
?>