<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
$service=array();
$sql="select *,count(mp.des_id) as qty from services s, make_payment mp where mp.patient_id='{$patient_id}' and des_name='service' and mp.des_id=s.service_id ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
while($row = mysqli_fetch_array($res))
{
	$service[]=$row;
	
	
}
print json_encode($service);



?>