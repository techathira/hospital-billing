<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
$amount=$data->amount;
$paymentmode=$data->payment;
if($paymentmode=="Both")
{
$cashamnt=$data->devidecash;
if(!isset($cashamnt))
$cashamnt=0;
$cardamnt=$amount-$cashamnt;
}
if($paymentmode=="Cash")
{

$cashamnt=$amount;
$cardamnt=0;
}

if($paymentmode=="Card")
{
$cashamnt=0;
$cardamnt=$amount;
}
date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$currtime=date("h-i-sa");

$sql_advance="SELECT SUM(advance) as advance FROM beds_allotment WHERE patient_id='{$patient_id}' and flag=0";
$res_advance=mysqli_query($con,$sql_advance) or die(mysqli_error($con));
$row_advance=mysqli_fetch_array($res_advance);
$advance=$row_advance['advance'];

$total=$amount+$advance;
$sql_insert="UPDATE beds_allotment SET advance='{$total}' WHERE patient_id='{$patient_id}' and flag=0 ORDER BY patient_id DESC LIMIT 1";
$res_insert=mysqli_query($con,$sql_insert) or die(mysqli_error($con));

$insert_advance="insert into advance(patient_id,date,time,paymentmode,cashamt,cardamt,advance) values ('{$patient_id}','{$currdate}','{$currtime}','{$paymentmode}','{$cashamnt}','{$cardamnt}','{$amount}')";
mysqli_query($con,$insert_advance) or die(mysqli_error($con));

$send=array();
$advance="select * from advance a,patient_registration pr where a.patient_id=pr.patient_id";
$res_advance=mysqli_query($con,$advance) or die(mysqli_error($con));
while($row2=mysqli_fetch_array($res_advance))
{
$send[]=$row2;
}
print json_encode($send);

?>