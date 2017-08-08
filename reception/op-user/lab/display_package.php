<?php
require_once("../../database.php");
$sql="select p.package_id,package_name,(sum(price)-(sum(price)/offer)) as totalprice, count(test_id) as no_of_test from package p,package_test pt where p.package_id=pt.package_id  ";
		$send=array();
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		$send=array();
		while($row=mysqli_fetch_array($res)){
			$send[]=$row;
		}
		print json_encode($send);

?>