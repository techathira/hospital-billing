<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;
$discount=$data->discount;
$total=$data->total;
$payment=$data->payment_mode;
$balance=$data->balance;
if($payment=="Both")
{
$cashamt=$data->display_pay_details->devidecash;
$cardamt=$total-$discount-$cashamt-$balance;
}
if($payment=="Cash")
{
$cashamt=$total-$discount-$balance;
$cardamt=0;
}
if($payment=="Card")
{
$cashamt=0;
$cardamt=$total-$discount-$balance;
}


$update="UPDATE op_make_payment SET paymentmode='{$payment}',cashamt='{$cashamt}',cardamt='{$cardamt}',balance='{$balance}',totalamt='{$total}',discount='{$discount}' WHERE bill_no='{$bill_no}'";
$res_update=mysqli_query($con,$update) or die(mysqli_error($con));



$sql="SELECT * FROM op_make_payment mk,patient_registration pr WHERE  mk.bill_no='{$bill_no}' and mk.patient_id=pr.patient_id  ORDER BY bill_no DESC LIMIT 1";

$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['bill_no']=$row_patient['bill_no'];
				$send['date']=$row_patient['date'];
				$send['paymentmode']=$row_patient['paymentmode'];
				$send['patient_id']=$row_patient['patient_id'];
				$send['patient_name']=$row_patient['patient_name'];
				$send['gender']=$row_patient['gender'];
				$send['phone']=$row_patient['phone'];
				$send['barcode']=$row_patient['barcode'];
				$send['age']=$row_patient['age'];
				$send['ref_doc_id']=$row_patient['ref_doc_id'];
				if($row_patient['ref_doc_id']==0)	
				$send['ref_name']="No Referal";
			else
			{   
		         $ref_sql="SELECT * FROM op_make_payment mk,referal_doctor rd WHERE  mk.bill_no='{$bill_no}' and mk.ref_doc_id=rd.ref_doc_id ORDER BY bill_no DESC LIMIT 1";

               $ref_res_patient=mysqli_query($con,$ref_sql) or die(mysqli_error($con));
			   $ref_row_patient=mysqli_fetch_array($ref_res_patient);
				$send['ref_name']=$ref_row_patient['ref_name'];
	         }
	print json_encode($send);	
?>