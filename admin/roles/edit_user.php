<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$user_id=$data->user_id;

$sql="select * from users where user_id= '{$user_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$user=array();
$row = mysqli_fetch_array($res);
  $user['username'] = $row['username'];
  $user['user_id'] = $row['user_id'];
  $user['email'] = $row['email'];
  $user['phone'] = $row['phone'];
  $user['password'] = $row['password'];
  $user['type'] = $row['type'];
  $user['priority'] = $row['priority'];

print json_encode($user);
?>