<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$package_name = $data->package_name;
$offer = $data->offer;
$sql= "INSERT INTO package (package_name,offer)VALUES ('{$package_name}','{$offer}')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$select="SELECT * FROM package ORDER BY package_id DESC LIMIT 1";
$res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($res);
$package_id=$row['package_id'];

foreach ( $data->tests as $key => $value) {


 $test_id=$value->test_id;
 $price=$value->price;
 
 $sql_package_test="INSERT INTO package_test (package_id,test_id,price) VALUES ('{$package_id}','{$test_id}','{$price}')";
 $res=mysqli_query($con,$sql_package_test) or die(mysqli_error($con));
 

 
}
       $sql="select p.package_name,(sum(pt.price)-((sum(pt.price)/100) * p.offer)) as totalprice from package p,package_test pt where p.package_id=pt.package_id GROUP BY pt.package_id";
		
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		$send=array();
		while($row=mysqli_fetch_array($res)){
			$send[]=$row;
		}
		print json_encode($send);





?>