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
$id=$data->patient_id;
$sql="select patient_id from patient_registration where patient_id = '{$id}' or phone= '{$id}'  ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row= mysqli_fetch_array($res);
$patient_id=$row['patient_id'];
$paymentmode=$data->paymentmode;
$flag=$data->flag;
$ref_doc=$data->ref_doc;




$balance=$data->balance;
$amount=$data->amount;
if($paymentmode=="Both")
{
$cashamt=$data->paymode->devidecash;
$cardamt=$amount-$cashamt-$balance;
}
if($paymentmode=="Cash")
{
$cashamt=$amount-$balance;
$cardamt=0;
}
if($paymentmode=="Card")
{
$cashamt=0;
$cardamt=$amount-$balance;
}

$balance=$data->balance;


$tests=array();
$tests2=array();
$testsdata=array();
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d");

$time=date(' h:i:sa' );
$testdata=array();
$data1=array();
$packageinfo=array();

if($flag=="test")
{
	

    //  foreach($data->testnames as $key1=>$val1)
       //{
			$teststaken="insert into op_lab_tests_taken(description,paymentmode,cashamt,cardamt,balance,amount,date,time,patient_id,user_id,ref_doc_id) values('{$flag}','{$paymentmode}','{$cashamt}','{$cardamt}','{$balance}','{$amount}','{$date}','{$time}','{$patient_id}','{$user_id}','{$ref_doc}')";
			$takenresult=mysqli_query($con,$teststaken) or die(mysqli_error($con));
			
			$patient="SELECT p.*, lab_billno,paymentmode,date from op_lab_tests_taken,patient_registration p where p.patient_id='{$patient_id}' ORDER by lab_billno DESC LIMIT 1";
			$patient_res=mysqli_query($con,$patient) or die(mysqli_error($con));
		    $row1= mysqli_fetch_array($patient_res);
		    
			$bill_no_lab=$row1['lab_billno'];
		    $total_sum=0;
		 	foreach($data->testnames as $key=>$val)
		{
                $addcharge=$data->addsum[$key];		
		        $total_sum+=$addcharge;
		        $addtionaltaken="insert into op_lab_tests_taken1(bill_no,patient_id,test_id,price,date,time) values('{$bill_no_lab}','{$patient_id}' ,'{$key}','{$addcharge}','{$date}' ,'{$time}')";
				 $last_res1=mysqli_query($con,$addtionaltaken) or die(mysqli_error($con));
				 
				 	     
			      
		} 
            $update_amt="update op_lab_tests_taken set amount='{$total_sum}' where lab_billno='{$bill_no_lab}' ";
				 $update_op=mysqli_query($con,$update_amt) or die(mysqli_error($con));
				  		
		
		$pricedetails="select t.test_name,op.price from op_lab_tests_taken1 op,tests t where bill_no='{$bill_no_lab}' and op.test_id=t.test_id";
		$price_array=mysqli_query($con,$pricedetails) or die(mysqli_error($con));
		while($row_price= mysqli_fetch_array($price_array)){
		
		    $testsdata[]=$row_price;
		
		}
		$tests["testdata"]=$testsdata;
		
	if($ref_doc==0)
{
		
		$patient="SELECT p.*,t.lab_billno,t.paymentmode,t.date from op_lab_tests_taken t,patient_registration p where p.patient_id='{$patient_id}' ORDER by t.lab_billno DESC LIMIT 1";
			$patient_res=mysqli_query($con,$patient) or die(mysqli_error($con));
		    $row1= mysqli_fetch_array($patient_res);
		    $data1['patient_id']=$row1['patient_id'];
		    $data1['ref_name']="No Referal";
		    $data1['total_sum']=$total_sum;
		    $data1['phone']=$row1['phone'];
		    $data1['patient_name']=$row1['patient_name'];
		    $data1['gender']=$row1['gender'];
		    $data1['age']=$row1['age'];
		    $data1['barcode']=$row1['barcode_reader'];
		    $data1['billno']=$row1['lab_billno'];
			$bill_no_lab=$row1['lab_billno'];
		    $data1['paymentmode']=$row1['paymentmode'];
			$data1['date']=$row1['date'];
		    $tests["personal"]=$data1;
		  
  
  
  
  print json_encode($tests);
  
  }
 else{
	 $patient="SELECT p.*,t.lab_billno,t.paymentmode,t.date,rd.* from op_lab_tests_taken t,patient_registration p,referal_doctor rd where p.patient_id='{$patient_id}' and t.ref_doc_id=rd.ref_doc_id ORDER by t.lab_billno DESC LIMIT 1";
			$patient_res=mysqli_query($con,$patient) or die(mysqli_error($con));
		    $row1= mysqli_fetch_array($patient_res);
		    $data1['patient_id']=$row1['patient_id'];
		    $data1['ref_name']=$row1['ref_name'];
		    $data1['total_sum']=$total_sum;
		    $data1['phone']=$row1['phone'];
		    $data1['patient_name']=$row1['patient_name'];
		    $data1['gender']=$row1['gender'];
		    $data1['age']=$row1['age'];
		    $data1['barcode']=$row1['barcode_reader'];
		    $data1['billno']=$row1['lab_billno'];
			$bill_no_lab=$row1['lab_billno'];
		    $data1['paymentmode']=$row1['paymentmode'];
			$data1['date']=$row1['date'];
		    $tests["personal"]=$data1;
		  
  
  
  
  print json_encode($tests);
 }
}
if($flag=="package")
{
        $teststaken="insert into op_lab_tests_taken(description,paymentmode,amount,date,time,patient_id,user_id) values('{$flag}','{$paymentmode}','{$amount}','{$date}','{$time}','{$patient_id}','{$user_id}')";
	    $takenresult=mysqli_query($con,$teststaken) or die(mysqli_error($con));

}
?>