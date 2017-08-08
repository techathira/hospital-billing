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
$bed_id=$data->bed_id;
$ward_id=$data->ward_id;
$room_id=$data->room_id;
$patient_id1=$data->patient_id;
$advance=$data->advance;
$ref_doc=$data->ref_doctor_list;
$getpatient_id="select patient_id from patient_registration where patient_id='{$patient_id1}' or phone='{$patient_id1}'";
$respatient_id=mysqli_query($con,$getpatient_id) or die(mysqli_error($con));
$row2=mysqli_fetch_array($respatient_id);
$patient_id=$row2['patient_id'];

$paymentmode=$data->payment;
if($paymentmode=="Both")
{
$cashamnt=$data->devidecash;
if(!isset($cashamnt))
$cashamnt=0;
$cardamnt=$advance-$cashamnt;
}
if($paymentmode=="Cash")
{

$cashamnt=$advance;
$cardamnt=0;
}

if($paymentmode=="Card")
{
$cashamnt=0;
$cardamnt=$advance;
}

if(isset($data->insurance_id))
$insurance_id=$data->insurance_id;
else
$insurance_id=0;



date_default_timezone_set("Asia/Calcutta");
$indate=date("Y-m-d h:i:sa");
$currdate=date("Y-m-d");
$currtime=date("h-i-sa");

$sql_insert="INSERT INTO beds_allotment (bed_id,ward_id,room_id,patient_id,insurance_id,advance,from_date,admited_user_id,ref_doc_id) VALUES ('{$bed_id}','{$ward_id}','{$room_id}','{$patient_id}','{$insurance_id}','{$advance}','{$indate}','{$user_id}','{$ref_doc}')";
$res=mysqli_query($con,$sql_insert) or die(mysqli_error($con));
$update="UPDATE beds SET status=1 WHERE bed_id='{$bed_id}' and ward_id='{$ward_id}'";
$update_result=mysqli_query($con,$update) or die(mysqli_error($con));

$insert_advance="insert into advance(patient_id,date,time,paymentmode,cashamt,cardamt,advance) values ('{$patient_id}','{$currdate}','{$currtime}','{$paymentmode}','{$cashamnt}','{$cardamnt}','{$advance}')";
mysqli_query($con,$insert_advance) or die(mysqli_error($con));

?>