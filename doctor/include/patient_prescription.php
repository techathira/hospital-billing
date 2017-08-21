<?php
session_start();
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$appointment_id = $data->appointment_id;

	$sql="SELECT * from patient_prescription where appointment_id='{$appointment_id }'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
		
	$send[]=explode(",",$row['drug_id']);
	$send[]=explode(",",$row['dosage']);
	$send[]=explode(",",$row['mbf']);
	$send[]=explode(",",$row['maf']);
	$send[]=explode(",",$row['abf']);
	$send[]=explode(",",$row['aaf']);
	$send[]=explode(",",$row['nbf']);
	$send[]=explode(",",$row['naf']);
	$name[]=array(0=>"drug_id",1=>"dosage",2=>"mbf",3=>"maf",4=>"abf",5=>"aaf",6=>"nbf",7=>"naf");
	
	$a=$name[0];
	$len=sizeof($send);
	$len1=sizeof($send[0]);
	for($i=0;$i<$len1;$i++){
		
		$drug_sql="select * from prescription where 	drug_id='{$send[0][$i]}'";
		$drug_res=mysqli_query($con,$drug_sql) or die(mysqli_error($con));
		$drug_row=mysqli_fetch_array($drug_res,MYSQLI_ASSOC);
		
		for($j=0;$j<$len;$j++){
			$drug_details[$i][$a[$j]]=$send[$j][$i];
			$drug_details[$i]['drug_name']=$drug_row['name'];
		}
	}
	
$result=$drug_details;
print json_encode($result);

?>