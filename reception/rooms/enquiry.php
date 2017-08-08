<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
	$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}
require_once("../../database.php");

$sql="select * from beds_allotment ba,patient_registration pr,beds b,ward w,room_category rc,insurance i where ba.bed_id=b.bed_id and ba.patient_id=pr.patient_id and ba.ward_id=w.ward_id and b.ward_id=w.ward_id and ba.room_id=rc.room_id and w.room_id=rc.room_id and ba.flag=0 and ba.to_date is null and ba.insurance_id=i.company_id";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>