<?php
require_once("../../database.php");
	$data = json_decode(file_get_contents("php://input"));
	$id=$data->patient_id;
	
$sql="select * from patient_registration where patient_id='{$id}'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
	include "test_barcode.php"; 

	// set Barcode39 object 
	$bc = new Barcode39($row['barcode_reader']); 

	// display new barcode 
	$barcode=$bc->draw();
print json_encode($barcode);
?>