<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$todate=$data->todate;
$fromdate=$data->fromdate;
$recep_id=$data->ref_doc_id;
if($recep_id=="All")
{
$sql="select t.lab_billno,p1.patient_name as description, t.date,t.amount,t.paymentmode,rd.ref_name from op_lab_tests_taken t,patient_registration p1,referal_doctor rd where t.patient_id=p1.patient_id and t.ref_doc_id>0 and t.ref_doc_id=rd.ref_doc_id and t.date between '{$fromdate}'  and '{$todate}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

	
}
else
{
$sql="select t.lab_billno,p1.patient_name as description, t.date,t.amount,t.paymentmode,rd.ref_name from op_lab_tests_taken t,patient_registration p1,referal_doctor rd where t.patient_id=p1.patient_id and t.ref_doc_id>0 and t.ref_doc_id=rd.ref_doc_id and t.date between '{$fromdate}'  and '{$todate}' and t.ref_doc_id='{$recep_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>