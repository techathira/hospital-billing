<?php
	require_once("../../database.php");
	header("Content-type: image/png");
	$data = json_decode(file_get_contents("php://input"));
	$patient_id=$data->patient_id;
	$doctor_id=$data->doctor_id;
	$age=$data->age;
	$payment=$data->payment;
	date_default_timezone_set("Asia/Kolkata");
	$date=date('d-m-y');
     $time=date(' h:i:sa' );
	 $amount=$data->fee;

	$sql="INSERT INTO consultation(patient_id,doctor_id,date,payment,age,time) VALUES ('{$patient_id}','{$doctor_id}','{$date}','{$payment}','{$age}','{$time}')";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	
	$op_consult="INSERT INTO op_consultation(patient_id,doctor_id,date,time,payment_mode,amount) VALUES ('{$patient_id}','{$doctor_id}','{$date}','{$time}','{$payment}','{$amount}')";
	$res1=mysqli_query($con,$op_consult) or die(mysqli_error($con));
	
	/*  Data to be sent for print recipt */
	if($res1)
	{
	$sqlprint="select p.*, op.slno ,op.date, d.doctor_id,d.doctor_name,d.fee from patient_registration p,doctors d , op_consultation op WHERE d.doctor_id=op.doctor_id and p.patient_id =op.patient_id ORDER by slno DESC LIMIT 1";
	$printres=mysqli_query($con,$sqlprint) or die(mysqli_error($con));
	
		if($printres) {
		
		$send=array();
		$row=mysqli_fetch_array($printres,MYSQLI_ASSOC);
		
				$send['patient_id']=$row['patient_id'];
				$send['slno']=$row['slno'];
				$send['patient_name']=$row['patient_name'];
				$send['phone']=$row['phone'];
				$send['barcode']=$row['barcode_reader'];
				$send['age']=$row['age'];
				$send['gender']=$row['gender'];
				$send['doctor_name']=$row['doctor_name'];
				$send['fee']=$row['fee'];
	            $send['date']=$row['date'];
				
			
				print json_encode($send);
		
		
		} 
	
	}
	
	
	

		


?>

