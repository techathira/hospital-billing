<?php
session_start();
require_once("../../database.php");
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
	$doctor_id=$_SESSION['user_id'];
	$appointment_id=$_SESSION['appointment_id'];
	$sql="select dy.day,ds.name,d.doctor_name,DATE_FORMAT(dt.from_time, '%H:%i') as from_time,DATE_FORMAT(dt.to_time, '%H:%i') as to_time from doctors d CROSS join day dy  CROSS JOIN doctor_session ds  LEFT JOIN doctor_timing dt on dt.session_id=ds.session_id AND dt.day_id=dy.day_id and dt.doctor_id='{$doctor_id}' WHERE d.doctor_id='{$doctor_id}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$send[$row['day']][]=$row;
	}
//var_dump($send);
	print json_encode($send);
}
else{
	die();	
} 
?>