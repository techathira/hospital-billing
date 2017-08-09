<?php
require_once("../../database.php");
$send=array();
$advance="select * from advance a,patient_registration pr where a.patient_id=pr.patient_id";
$res_advance=mysqli_query($con,$advance) or die(mysqli_error($con));
while($row2=mysqli_fetch_array($res_advance))
{
$send[]=$row2;
}
print json_encode($send);

?>