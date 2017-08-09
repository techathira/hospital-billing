<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;



$sql_beds="SELECT distinct ba.room_id,rc.room_name, sum(number_of_days) as quantity,rc.price, rc.price * sum(number_of_days) as totalprice FROM beds_allotment ba,room_category rc where patient_id='{$patient_id}' and ba.room_id=rc.room_id GROUP BY ba.room_id";

$sql_service="select DISTINCT st.service_id,s.service_name,count(*) as quant,amount,sum(amount) as totalamount from service_taken st,patient_registration pr,services s where pr.patient_id='{$patient_id}' and pr.patient_id=st.patient_id and st.service_id=s.service_id GROUP BY st.service_id";

$res_beds=mysqli_query($con,$sql_beds) or die(mysqli_error($con));
$res_service=mysqli_query($con,$sql_service) or die(mysqli_error($con));
$discharge=array();
$beds=array();
$services=array();

while($row_bed=mysqli_fetch_array($res_beds))
{
	$discharge[]=$row_bed;
}
while($row_service=mysqli_fetch_array($res_service))
{
	$discharge[]=$row_service;
}
 
  	print json_encode($discharge);

?>