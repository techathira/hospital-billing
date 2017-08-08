<?php
require_once("../../database.php");
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
{
		$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}


$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->display_patient_details->patient_id;
$bed_id=$data->display_patient_details->bed_id;
$ward_id=$data->display_patient_details->ward_id;
$number_of_days=$data->display_patient_details->number_of_days;
$room_id=$data->display_patient_details->room_id;
$balance=$data->balance;
$cashtotalamt=$data->display_pay_details->devidetotalamt;
$paymentmode=$data->display_patient_details->payment;
$amount_payer=$data->insurance->amount_member;
$discount=$data->insurance->discount;
$service_tax=$data->insurance->service_tax;
if($paymentmode=="Both")
{
$cashamnt=$data->display_pay_details->devidecash-$amount_payer-$discount+$service_tax;
if(!isset($cashamnt))
$cashamnt=0;
$cardamnt=$cashtotalamt-$cashamnt;
}
if($paymentmode=="Cash")
{

$cashamnt=$cashtotalamt-$amount_payer-$discount+$service_tax;
$cardamnt=0;
}

if($paymentmode=="Card")
{
$cashamnt=0;
$cardamnt=$cashtotalamt-$amount_payer-$discount+$service_tax;
}



date_default_timezone_set("Asia/Calcutta");
$currdate=date("Y-m-d");
$currtime=date("h-i-sa");
$date_time=date("Y-m-d h:i:sa");

$sql_update_beds="UPDATE beds SET status=0 WHERE bed_id='{$bed_id}' and ward_id='{$ward_id}'";
$sql_update_beds_allot="UPDATE beds_allotment SET to_date='{$date_time}',number_of_days='{$number_of_days}' where bed_id='{$bed_id}' and ward_id='{$ward_id}' and room_id='{$room_id}' and patient_id='{$patient_id}' and to_date IS NULL and number_of_days IS NULL";

$update_result_bed=mysqli_query($con,$sql_update_beds) or die(mysqli_error($con));
$update_result_bed_allot=mysqli_query($con,$sql_update_beds_allot) or die(mysqli_error($con));

$sql_beds="SELECT distinct ba.room_id,rc.room_name, sum(number_of_days) as quantity,rc.price, rc.price * sum(number_of_days) as totalprice FROM beds_allotment ba,room_category rc where patient_id='{$patient_id}' and ba.room_id=rc.room_id and ba.flag=0 GROUP BY ba.room_id";

$sql_service="select DISTINCT st.service_id,s.service_name,count(*) as quant,amount,sum(amount) as totalamount from service_taken st,patient_registration pr,services s where pr.patient_id='{$patient_id}' and st.flag=0 and pr.patient_id=st.patient_id and st.service_id=s.service_id GROUP BY st.service_id,st.amount";

$res_beds=mysqli_query($con,$sql_beds) or die(mysqli_error($con));
$res_service=mysqli_query($con,$sql_service) or die(mysqli_error($con));
$total=0;

$select_advance="SELECT advance,ref_doc_id FROM beds_allotment where patient_id='{$patient_id}' and  flag=0";
$res_advance=mysqli_query($con,$select_advance) or die(mysqli_error($con));
$row_advance=mysqli_fetch_array($res_advance);
$advance=(int)$row_advance['advance'];
$ref_doc_id=(int)$row_advance['ref_doc_id'];

$sql_update_beds_allott="UPDATE beds_allotment SET flag=1,discharge_user_id = '{$user_id}' where  patient_id='{$patient_id}' and flag=0 and discharge_user_id=0";
$update_result_bed_allott=mysqli_query($con,$sql_update_beds_allott) or die(mysqli_error($con));
/*
$sql_ref_doc="SELECT * FROM beds_allotment bd,referal_doctor rd where bd.patient_id='{$patient_id}' and bd.flag=0 and bd.ref_doc_id=rd.ref_doc_id"
$res_ref_doc=mysqli_query($con,$sql_ref_doc) or die(mysqli_error($con));
$row_ref_doc=mysqli_fetch_array($res_ref_doc);
$ref_doc_id=$row_ref_doc['ref_doc_id']
if($ref_doc_id==null)
$ref_name="No referal";
else
$ref_name=$ref_doc_id['ref_name'];
*/
	
$insert_makepayment="insert into make_payment(patient_id,date,time,cashamt,cardamt,advance,balance,totalamt,paymentmode,user_id,ref_doc_id) values ('{$patient_id}','{$currdate}','{$currtime}','{$cashamnt}','{$cardamnt}','{$advance}','{$balance}','{$total}','{$paymentmode}','{$user_id}','{$ref_doc_id}')";
mysqli_query($con,$insert_makepayment) or die(mysqli_error($con));

$select_billno="select bill_no from make_payment where patient_id='{$patient_id}' and time='{$currtime}' and date='{$currdate}' ";
$bill_res=mysqli_query($con,$select_billno) or die(mysqli_error($con));
$row_bill=mysqli_fetch_array($bill_res);
$bill_no=$row_bill['bill_no'];

$discharge=array();
while($row_bed=mysqli_fetch_array($res_beds))
{
	$discharge[]=$row_bed;

	$insert_detail="insert into ip_bill_details(description,quantity,amount,total,bill_no) values('{$row_bed['room_name']}','{$row_bed['quantity']}','{$row_bed['price']}','{$row_bed['totalprice']}','{$bill_no}')";
	mysqli_query($con,$insert_detail) or die(mysqli_error($con));
	$total+=$row_bed['totalprice'];
}
while($row_service=mysqli_fetch_array($res_service))
{
	$discharge[]=$row_service;
	
	$total+=$row_service['totalamount'];
	$insert_detail="insert into ip_bill_details(description,quantity,amount,total,bill_no) values('{$row_service['service_name']}','{$row_service['quant']}','{$row_service['amount']}','{$row_service['totalamount']}','{$bill_no}')";
	mysqli_query($con,$insert_detail) or die(mysqli_error($con));
	$update_service="update service_taken set flag=1 where patient_id= '{$patient_id}' ";
	mysqli_query($con,$update_service) or die(mysqli_error($con));
}
$amount_patient=$total-$advance-$amount_payer;
$totalamt=$total-$discount+$service_tax;
$update_makepayment="update make_payment set totalamt='{$total}',amount_payer='{$amount_payer}',amount_patient='{$amount_patient}',discount='{$discount}',service_tax='{$service_tax}' where bill_no = '{$bill_no}' ";
mysqli_query($con,$update_makepayment) or die(mysqli_error($con));

	print json_encode($discharge);

?>