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
$fromdate=$data->fromdate;
$todate=$data->todate;

$sql="select op.bill_no,CONCAT('OP ','Billing') as description, op.date,op.totalamt,op.paymentmode,op.cashamt as cashamt,op.cardamt as cardamt from op_make_payment op where op.user_id='{$user_id}' and op.date between '{$fromdate}' and '{$todate}' UNION select mp.bill_no, CONCAT('IP ','Billing') as description, mp.date ,mp.totalamt,mp.paymentmode,mp.cashamt as cashamt,mp.cardamt as cardamt from make_payment mp where mp.user_id='{$user_id}' and mp.date between '{$fromdate}' and '{$todate}' UNION SELECT p.package_billno as bill_no,CONCAT('Packaage ','Billing') as description,p.date,p.totalamount as totalamt,p.paymentmode,p.cashamt as cashamt,p.cardamt as cardamt from op_lab_package_taken p where p.user_id='{$user_id}' and p.date between '{$fromdate}' and '{$todate}' UNION SELECT t.lab_billno as bill_no, CONCAT('Test ','Billing') as description,t.date,t.amount as totalamt,t.paymentmode,t.cashamt as cashamt,t.cardamt as cardamt from op_lab_tests_taken t where t.user_id='{$user_id}' and t.date between '{$fromdate}' and '{$todate}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>
