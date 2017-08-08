<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
$patient_name=$data->patient_name;
$room_id=$data->room_id;
$room_name=$data->room_name;
$ward_id=$data->ward_id;
$ward_name=$data->ward_name;
$bed_id=$data->bed_id;
$from_date=$data->from_date;

$number_of_days=$data->number_of_days;

date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d h:i:sa");

//echo $date_time;


$sql_update_beds="UPDATE beds SET status=0 WHERE bed_id='{$bed_id}' and ward_id='{$ward_id}'";
$sql_update_beds_allot="UPDATE beds_allotment SET to_date='{$currdate}',number_of_days='{$number_of_days}' where bed_id='{$bed_id}' and ward_id='{$ward_id}' and room_id='{$room_id}' and patient_id='{$patient_id}' and to_date IS NULL and number_of_days IS NULL";

$update_result_bed=mysqli_query($con,$sql_update_beds) or die(mysqli_error($con));
$update_result_bed_allot=mysqli_query($con,$sql_update_beds_allot) or die(mysqli_error($con));


?>