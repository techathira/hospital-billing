<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));


$sql="select * from doctors";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>