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
$data = json_decode(file_get_contents("php://input"));
$to_date=$data->todate;
$from_date=$data->fromdate;

$sql="SELECT t.lab_billno as bill_no,p4.patient_id,p4.patient_name as description,t.date,t.amount as totalamt,t.paymentmode,t.cashamt as cashamt,t.cardamt as cardamt,t.balance as balance from op_lab_tests_taken t,patient_registration p4 where t.patient_id=p4.patient_id and t.user_id='{$user_id}' and t.date between '{$from_date}' and '{$to_date}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>