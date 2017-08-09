<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$insurance_id=$data->insurance_id;

$sql="delete from insurance where insurance_id= '{$insurance_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$sql="select * from insurance";
$data=array();
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
	$data[]=$row;	
}
print json_encode($data);


?>