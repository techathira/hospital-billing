<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$email=$data->email;
$phone=$data->phone;
$specialzation=$data->specialzation;
$experience=$data->experience;
$age=$data->age;
$gender=$data->gender;
$fee=$data->fee;
	$photo="";


$sql="insert into doctors(doctor_name,email,phone,experience,age,gender,specialization,fee,photo) values('{$name}','{$email}','{$phone}','{$experience}','{$age}','{$gender}','{$specialzation}','{$fee}','{$photo}')";
$res=mysqli_query($con,$sql);

$display="select * from doctors";
$result=mysqli_query($con,$display);
$data_array=array();
while($row=mysqli_fetch_array($result))
{
	$data_array[]=$row;
}
print json_encode($data_array);

?>