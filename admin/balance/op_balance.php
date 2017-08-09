<?php

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$bill_no=$data->bill_no;
$balance=$data->balance;
$des=$data->description;
$payable=$data->payable;
$paymentmode=$data->paymentmode;
$date=date("Y-m-d");
$send=array();
if($des="OP Billing")
{
$select="SELECT cashamt,cardamt,totalamt FROM op_make_payment WHERE bill_no='{$bill_no}'";
$select_res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_res);
$cash=$row['cashamt'];
$card=$row['cardamt'];
$amount=$row['totalamt'];



if($paymentmode=="Both")
{
$cashamt=$cash+$data->paymode->devidecash;
$cardamt=$card+$data->paymode->devidecard;
$total=$amount;
}
if($paymentmode=="Cash")
{
$cashamt=$cash+$payable;
$cardamt=$card;
$total=$amount;
}
if($paymentmode=="Card")
{
$cashamt=$cash;
$cardamt=$card+$payable;
$total=$amount;
}
$sql="UPDATE op_make_payment SET cashamt='{$cashamt}',cardamt='{$cardamt}',totalamt='{$total}',balance='{$balance}' WHERE bill_no='{$bill_no}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$select_sql="SELECT * FROM op_make_payment op,patient_registration p where op.bill_no='{$bill_no}' and op.patient_id=p.patient_id";

$select_res_sql=mysqli_query($con,$select_sql) or die(mysqli_error($con));
	while($row=mysqli_fetch_array($select_res_sql))
	{
      $send['patient_id']=$row['patient_id'];
      $send['patient_name']=$row['patient_name'];
      $send['phone']=$row['phone'];
      $send['date']=$date;
      $send['balance']=$balance;
      $send['paying']=$payable;
      $send['paymentmode']=$paymentmode;
      $send['bill_no']=$bill_no;
	  
    }
}
if($des="PACKAGE Billing")
{
$select="SELECT cashamt,cardamt,totalamount FROM op_lab_package_taken WHERE package_billno='{$bill_no}'";
$select_res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_res);
$cash=$row['cashamt'];
$card=$row['cardamt'];
$amount=$row['totalamount'];



if($paymentmode=="Both")
{
$cashamt=$cash+$data->paymode->devidecash;
$cardamt=$card+$data->paymode->devidecard;
$total=$amount;
}
if($paymentmode=="Cash")
{
$cashamt=$cash+$payable;
$cardamt=$card;
$total=$amount;
}
if($paymentmode=="Card")
{
$cashamt=$cash;
$cardamt=$card+$payable;
$total=$amount;
}
$sql="UPDATE op_lab_package_taken SET cashamt='{$cashamt}',cardamt='{$cardamt}',totalamount='{$total}',balance='{$balance}' WHERE package_billno='{$bill_no}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$select_sql="SELECT * FROM op_lab_package_taken op,patient_registration p where op.package_billno='{$bill_no}' and op.patient_id=p.patient_id";

$select_res_sql=mysqli_query($con,$select_sql) or die(mysqli_error($con));
	while($row=mysqli_fetch_array($select_res_sql))
	{
      $send['patient_id']=$row['patient_id'];
      $send['patient_name']=$row['patient_name'];
      $send['phone']=$row['phone'];
      $send['date']=$date;
      $send['balance']=$balance;
      $send['paying']=$payable;
      $send['paymentmode']=$paymentmode;
      $send['bill_no']=$bill_no;
	  
    }
}
if($des="TEST Billing")
{
$select="SELECT cashamt,cardamt,amount FROM op_lab_tests_taken WHERE lab_billno='{$bill_no}'";
$select_res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_res);
$cash=$row['cashamt'];
$card=$row['cardamt'];
$amount=$row['amount'];



if($paymentmode=="Both")
{
$cashamt=$cash+$data->paymode->devidecash;
$cardamt=$card+$data->paymode->devidecard;
$total=$amount;
}
if($paymentmode=="Cash")
{
$cashamt=$cash+$payable;
$cardamt=$card;
$total=$amount;
}
if($paymentmode=="Card")
{
$cashamt=$cash;
$cardamt=$card+$payable;
$total=$amount;
}
$sql="UPDATE op_lab_tests_taken SET cashamt='{$cashamt}',cardamt='{$cardamt}',amount='{$total}',balance='{$balance}' WHERE lab_billno='{$bill_no}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$select_sql="SELECT * FROM op_lab_tests_taken op,patient_registration p where op.lab_billno='{$bill_no}' and op.patient_id=p.patient_id";

$select_res_sql=mysqli_query($con,$select_sql) or die(mysqli_error($con));
	while($row=mysqli_fetch_array($select_res_sql))
	{
      $send['patient_id']=$row['patient_id'];
      $send['patient_name']=$row['patient_name'];
      $send['phone']=$row['phone'];
      $send['date']=$date;
      $send['balance']=$balance;
      $send['paying']=$payable;
      $send['paymentmode']=$paymentmode;
      $send['bill_no']=$bill_no;
	  
    }
}
if($des="IP Billing")
{
$select="SELECT cashamt,cardamt,totalamt FROM make_payment WHERE bill_no='{$bill_no}'";
$select_res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_res);
$cash=$row['cashamt'];
$card=$row['cardamt'];
$amount=$row['totalamt'];



if($paymentmode=="Both")
{
$cashamt=$cash+$data->paymode->devidecash;
$cardamt=$card+$data->paymode->devidecard;
$total=$amount;
}
if($paymentmode=="Cash")
{
$cashamt=$cash+$payable;
$cardamt=$card;
$total=$amount;
}
if($paymentmode=="Card")
{
$cashamt=$cash;
$cardamt=$card+$payable;
$total=$amount;
}
$sql="UPDATE make_payment SET cashamt='{$cashamt}',cardamt='{$cardamt}',totalamt='{$total}',balance='{$balance}' WHERE bill_no='{$bill_no}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$select_sql="SELECT * FROM make_payment op,patient_registration p where op.bill_no='{$bill_no}' and op.patient_id=p.patient_id";

$select_res_sql=mysqli_query($con,$select_sql) or die(mysqli_error($con));
	while($row=mysqli_fetch_array($select_res_sql))
	{
      $send['patient_id']=$row['patient_id'];
      $send['patient_name']=$row['patient_name'];
      $send['phone']=$row['phone'];
      $send['date']=$date;
      $send['balance']=$balance;
      $send['paying']=$payable;
      $send['paymentmode']=$paymentmode;
      $send['bill_no']=$bill_no;
	  
    }
}

 print json_encode($send);

?>