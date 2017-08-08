<?php
require_once("../../database.php");
  $sql="select p.package_name,(sum(pt.price)-((sum(pt.price)/100) * p.offer)) as totalprice from package p,package_test pt where p.package_id=pt.package_id GROUP BY pt.package_id";
		
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		$send=array();
		while($row=mysqli_fetch_array($res)){
			$send[]=$row;
		}
		print json_encode($send);

?>