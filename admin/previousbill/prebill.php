<?php

require_once("../../database.php");

$sql="SELECT * FROM op_make_payment op,patient_registration p WHERE op.patient_id=p.patient_id";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>