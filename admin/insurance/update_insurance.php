<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$insurance_id=$data->insurance_id;
$name=$data->company_name;
$comp_id=$data->company_id;
$email=$data->email;
$address=$data->address;
$city=$data->city;
$state=$data->state;
$country=$data->country;
$zip=$data->zip;
$phone=$data->phone;
if(isset($data->fax))
{
	$fax=$data->fax;
}
else {
	$fax="";
}



$sql="update insurance set phone='{$phone}',address='{$address}',  state='{$state}',city='{$city}',country = '{$country}',zip='{$zip}',fax='{$fax}' where insurance_id='{$insurance_id}' ";
 $res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	$sql="select * from insurance";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$insurance=array();
	while ($row = mysqli_fetch_array($res)) {
	  $insurance[] = $row;
	}
	print json_encode($insurance);
}
else
{
	$send="Previus details not Updated!!";
	print json_encode($send);
}
?>