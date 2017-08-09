<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

	
foreach( $data as $key => $value)
{
	
	$ward_id=$key;
	$beds=$value;
	$sql="update ward set number_of_bed='{$beds}' where ward_id='{$ward_id}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$delete_sql="delete from beds where ward_id='{$ward_id}'";
	mysqli_query($con,$delete_sql) or die(mysqli_error($con)); 
	for($i=1;$i<=$beds;$i++){
		
		$beds_sql="insert into beds(bed_id,ward_id,status) values ('{$i}','{$ward_id}',0)";
		mysqli_query($con,$beds_sql) or die(mysqli_error($con)); 
    }
}





?>