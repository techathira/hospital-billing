<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
	$drug_name=$data->drug_name;
$send=array();	
	$sql="insert into prescription(name) values('{$drug_name}') ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>=1){
		$send[]['message']=1;
		$send[]['drug_name']=$drug_name;
		$send[]['drug_id']=mysqli_insert_id($con);
	} else{
		$send[]['message']=0;
	}
print json_encode($send);
?>