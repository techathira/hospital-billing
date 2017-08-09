<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
mysqli_autocommit($con,FALSE);
$patient_id=$data->patient_id;
$bed_id=$data->bed_id;
$ward_id=$data->ward_id;
$number_of_days=$data->number_of_days;
$room_id=$data->room_id;
date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");

$sql_update_beds="UPDATE beds SET status=0 WHERE bed_id='{$bed_id}' and ward_id='{$ward_id}'";
$sql_update_beds_allot="UPDATE beds_allotment SET to_date='{$currdate}',number_of_days='{$number_of_days}' where bed_id='{$bed_id}' and ward_id='{$ward_id}' and room_id='{$room_id}' and patient_id='{$patient_id}' and to_date IS NULL and number_of_days IS NULL";

$update_result_bed=mysqli_query($con,$sql_update_beds) or die(mysqli_error($con));
$update_result_bed_allot=mysqli_query($con,$sql_update_beds_allot) or die(mysqli_error($con));

$sql_beds="SELECT distinct ba.room_id,rc.room_name, sum(number_of_days) as quantity,rc.price, rc.price * sum(number_of_days) as totalprice,ba.advance as advance FROM beds_allotment ba,room_category rc where ba.patient_id='{$patient_id}' and ba.room_id=rc.room_id and ba.flag=0 GROUP BY ba.room_id";

$sql_service="select DISTINCT st.service_id,s.service_name,count(*) as quant,amount,sum(amount) as totalamount from service_taken st,patient_registration pr,services s where pr.patient_id='{$patient_id}' and st.flag=0 and pr.patient_id=st.patient_id and st.service_id=s.service_id GROUP BY st.service_id,st.amount";

$res_beds=mysqli_query($con,$sql_beds) or die(mysqli_error($con));
$res_service=mysqli_query($con,$sql_service) or die(mysqli_error($con));

$discharge=array();
while($row_bed=mysqli_fetch_array($res_beds))
{
	$discharge[]=$row_bed;
}
while($row_service=mysqli_fetch_array($res_service))
{
	$discharge[]=$row_service;

	
}


mysqli_rollback($con)  or die(mysqli_error($con));
	print json_encode($discharge);

?>