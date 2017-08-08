<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;

$sql="select * from op_lab_package_taken op,patient_registration pr where package_billno='{$bill_no}' and op.patient_id=pr.patient_id";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
	$row_patient = mysqli_fetch_array($res);
	$send['description'] = $row_patient['description'];
	$send['totalamount'] = $row_patient['totalamount'];
	$send['bill_no']=$row_patient['package_billno'];
	$send['date']=$row_patient['date'];
	$send['paymentmode']=$row_patient['paymentmode'];
	$send['patient_id']=$row_patient['patient_id'];
	$send['patient_name']=$row_patient['patient_name'];
	$send['gender']=$row_patient['gender'];
	$send['phone']=$row_patient['phone'];
				
	$send['age']=$row_patient['age'];
	$send['ref_doc_id']=$row_patient['ref_doc_id'];
				if($row_patient['ref_doc_id']==0)	
				$send['ref_name']="No Referal";
			else
			{   
		         $ref_sql="SELECT * FROM op_lab_package_taken mk,referal_doctor rd WHERE  mk.package_billno='{$bill_no}' and mk.ref_doc_id=rd.ref_doc_id ORDER BY package_billno DESC LIMIT 1";

               $ref_res_patient=mysqli_query($con,$ref_sql) or die(mysqli_error($con));
			   $ref_row_patient=mysqli_fetch_array($ref_res_patient);
				$send['ref_name']=$ref_row_patient['ref_name'];
	         }	
print json_encode($send);
?>