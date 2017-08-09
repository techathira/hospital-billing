<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$test_id=$data->test_id;

$sql="delete from tests where test_id= '{$test_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

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
	$send="Previus details not Updated!!";
	print json_encode($send);
}
?>
