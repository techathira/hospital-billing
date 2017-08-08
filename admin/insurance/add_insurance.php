<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
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

$sql="INSERT INTO insurance (company_id,company_name, email, phone, address, state, city, country, zip, fax) values( '{$comp_id}','{$name}','{$email}','{$phone}','{$address}','{$state}','{$city}','{$country}','{$zip}','{$fax}' )";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	$sql="select * from insurance";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$insurance=array();
	while ($row = mysqli_fetch_array($res)) {
	  $insurance[] = $row;
	}
	print json_encode($insurance);
}
else
{
	$send="Previus details not inserted!!";
	print json_encode($send);
}


?>

