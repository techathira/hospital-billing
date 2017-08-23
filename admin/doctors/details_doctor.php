<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$id=$data->doctor_id;
$data=array();
$sql="select * from doctors where doctor_id='{$id}'";
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
	$data['doctor_id']=$row['doctor_id'];	
	$data['doctor_name']=$row['doctor_name'];	

	$sql_session="SELECT * FROM doctor_session";
$result_session = mysqli_query($con, $sql_session )or die(mysqli_error($con));
while($row_session=mysqli_fetch_array($result_session))
	$data['session'][]=$row_session;	
	
print json_encode($data);

?>