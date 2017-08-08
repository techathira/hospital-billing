<?php
	require_once("../../database.php");
	$data = json_decode(file_get_contents("php://input"));
	



		$sql="select * from doctors ORDER BY specialization ";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		$specialization=array();
		while($row=mysqli_fetch_array($res)){
			$specialization[]=$row;	 
		}
		

		
		print json_encode($specialization);


?>

