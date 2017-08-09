<?php
require_once("../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->to_date;

$from_date=$data->from_date;

$sql="select * from op_lab_package_taken where date between '{$from_date}' and '{$to_date}' order by  date ASC ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send=$row[];
}
print json_encode($send);
?>