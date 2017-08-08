<?php

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;
$paymentmode=$data->paymentmode;
$flag=$data->flag;
$amount=$data->amount;
$tests=array();
$tests2=array();
$testsdata=array();
date_default_timezone_set("Asia/Kolkata");
$date=date('d-m-y');
$time=date(' h:i:sa' );
$testdata=array();
$data1=array();
$packageinfo=array();

if($flag=="test")
{
		foreach($data->testnames as $key=>$val)
		{

				 $sql="select * from tests where test_id='{$key}'";
				 $last_res=mysqli_query($con,$sql) or die(mysqli_error($con));
				 $row= mysqli_fetch_array($last_res);
				 $testsdata[$key]=$row;
		}


$tests["testdata"]=$testsdata;


    //  foreach($data->testnames as $key1=>$val1)
       //{
			$teststaken="insert into op_lab_tests_taken(description,paymentmode,amount,date,time,patient_id) values('{$flag}','{$paymentmode}','{$amount}','{$date}','{$time}','{$patient_id}')";
			$takenresult=mysqli_query($con,$teststaken) or die(mysqli_error($con));
			
			$patient="SELECT p.*, lab_billno,paymentmode,date from op_lab_tests_taken,patient_registration p where p.patient_id='{$patient_id}' ORDER by lab_billno DESC LIMIT 1";
			$patient_res=mysqli_query($con,$patient) or die(mysqli_error($con));
		    $row1= mysqli_fetch_array($patient_res);
		    $data1['patient_id']=$row1['patient_id'];
		    $data1['phone']=$row1['phone'];
		    $data1['patient_name']=$row1['patient_name'];
		    $data1['gender']=$row1['gender'];
		    $data1['age']=$row1['age'];
		    $data1['barcode']=$row1['barcode_reader'];
		    $data1['billno']=$row1['lab_billno'];
		    $data1['paymentmode']=$row1['paymentmode'];
			$data1['date']=$row1['date'];
		    $tests["personal"]=$data1;
		  
		  
  
  
  
  print json_encode($tests);

}
if($flag=="package")
{
        $teststaken="insert into op_lab_tests_taken(description,paymentmode,amount,date,time,patient_id) values('{$flag}','{$paymentmode}','{$amount}','{$date}','{$time}','{$patient_id}')";
	    $takenresult=mysqli_query($con,$teststaken) or die(mysqli_error($con));

}
?>