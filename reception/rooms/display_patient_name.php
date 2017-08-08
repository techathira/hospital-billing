<?php
require_once("../../database.php");
//connect with the database

//get search term
$data = json_decode(file_get_contents("php://input"));
$data1=array();
$patient_id=$data->patient_id;
//get matched data from skills table
$query = "select * from patient_registration where patient_id='{$patient_id}'";
$res1=mysqli_query($con,$query) or die(mysqli_error($con));

$row=mysqli_fetch_array($res1);
    
	
    $data1['patient_name'] = $row['patient_name'];
	if(sizeof($data1)>8)
		break;		

//return json data

echo json_encode($data1);



?>