<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->patient_id;

$sql="SELECT * FROM make_payment WHERE patient_id='{$patient_id}' ORDER BY bill_no DESC LIMIT 1";

$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['bill_no']=$row_patient['bill_no'];
				$send['date']=$row_patient['date'];
				$send['paymentmode']=$row_patient['paymentmode'];
				if($row_patient['ref_doc_id']==0)
				{
                  $send['ref_name']="No Referal";
				}
				else
				{
					$sql_ref_doc="SELECT ref_name FROM make_payment mk,referal_doctor rd WHERE mk.patient_id='{$patient_id}' and mk.ref_doc_id=rd.ref_doc_id ORDER BY bill_no DESC LIMIT 1";
                     $res_ref_doc=mysqli_query($con,$sql_ref_doc) or die(mysqli_error($con));
                     $row_ref_doc=mysqli_fetch_array($res_ref_doc);					 
                  $send['ref_name']=$row_ref_doc['ref_name'];
				  
				}
								
				
	
	print json_encode($send);	
?>
	