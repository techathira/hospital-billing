<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$test_id=$data->test_id;

$sql="select * from tests where test_id= '{$test_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$test=array();
$row = mysqli_fetch_array($res);
  $test['test_id'] = $row['test_id'];
  $test['test_name'] = $row['test_name'];
  $test['price'] = $row['price'];

print json_encode($test);
?>