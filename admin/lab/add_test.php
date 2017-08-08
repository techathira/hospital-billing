<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$test_price=$data->price;
$test_cat_id=$data->test_cat_id;

$sql="INSERT INTO tests (test_name,test_cat_id, price) values( '{$name}','{$test_cat_id}','{$test_price}')";
$res=mysqli_query($con,$sql) or die(mysqli_error($sql));

if($res)
{
	$sql="select * from tests";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$tests=array();
	while ($row = mysqli_fetch_array($res)) {
	  $tests[] = $row;
	}
	print json_encode($tests);
}
else
{
	$send="Previus details not inserted!!";
	print json_encode($send);
}


?>

