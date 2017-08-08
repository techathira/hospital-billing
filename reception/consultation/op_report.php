<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->todate;

$from_date=$data->fromdate;
$recep_id=$data->doctor_id;

if($recep_id=="All")
{
$sql="select * from op_consultation opc,patient_registration p,doctors d,op_make_payment op where opc.patient_id=op.patient_id and p.patient_id=opc.patient_id and p.patient_id=op.patient_id and d.doctor_id= opc.doctor_id and opc.consulted_date between '{$from_date}' and '{$to_date}'";
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
$sql="select * from op_consultation opc,patient_registration p,doctors d,op_make_payment op where opc.patient_id=op.patient_id and p.patient_id=opc.patient_id and p.patient_id=op.patient_id and d.doctor_id= opc.doctor_id and opc.consulted_date between '{$from_date}' and '{$to_date}' and opc.doctor_id='{$recep_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>