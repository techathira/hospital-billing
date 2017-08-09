<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$package_id = $data->package_id;
$sql= "select p.package_id,p.package_name,(sum(price)-(sum(price)/offer)) as totalprice from package p,package_test pt where p.package_id='{$package_id}' and p.package_id=pt.package_id ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

		$send=array();
		$row=mysqli_fetch_array($res);
		
		    $send['package_id']=$package_id;
     		$send['package_name']=$row['package_name'];
			$send['totalprice']=$row['totalprice'];
			
		
		print json_encode($send);




/*
$select="SELECT * FROM package ORDER BY package_id DESC LIMIT 1;"
$row=mysqli_fetch_array($select);
$patient_id=$row['patient_id'];

foreach ( $data as $key => $value) {

foreach($value as $k=>$v)
{
 $test_id=$value->test_id;
 $price=$value->price;
 $sql="INSERT INTO package_test (package_id,test_id,price) VALUES ('{$package_id}','{$test_id}','{$price}')";
 
}
 
}
        $sql="select package_name,(sum(price)-(sum(price)/offer)) as totalprice from package p,package_test pt where p.package_id=pt.package_id  ";
		$send=array();
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));*/
?>

