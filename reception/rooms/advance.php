<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
mysqli_autocommit($con,FALSE);
$patient_id=$data->patient_id;
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
$discharge=array();
$sql_advance="SELECT SUM(advance) as advance FROM beds_allotment WHERE patient_id='{$patient_id}' and flag=0";
$res_advance=mysqli_query($con,$sql_advance) or die(mysqli_error($con));
$row_advance=mysqli_fetch_array($res_advance);
$discharge['advance']=$row_advance['advance'];

$sql_bill_no="SELECT make_payment.bill_no FROM make_payment ORDER BY make_payment.bill_no DESC LIMIT 1";
$res_service=mysqli_query($con,$sql_bill_no) or die(mysqli_error($con));
$row=mysqli_fetch_array($res_service);
$discharge['bill_no']=(int)$row['bill_no']+1;
print json_encode($discharge);

?>