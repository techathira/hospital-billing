<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$fromdate=$data->fromdate;
$todate=$data->todate;
$recep_id=$data->recep_id;

if($recep_id=="All")
{
$sql="select p.patient_name,mp.* from patient_registration p, make_payment mp where p.patient_id=mp.patient_id  and mp.date between '{$fromdate}'  and '{$todate}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
}	
else
{
	$sql="select p.patient_name,mp.* from patient_registration p, make_payment mp where p.patient_id=mp.patient_id and  mp.user_id='{$recep_id}' and mp.date between '{$fromdate}'  and '{$todate}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
}

?>