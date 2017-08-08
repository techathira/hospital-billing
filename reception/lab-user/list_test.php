<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$package_id = $data->package_id;
$sql="select t.test_id,t.test_name,t.price from package_test pt, tests t where pt.package_id='{$package_id}' and pt.test_id=t.test_id";
$data=array();
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
	$data[]=$row;	
}
print json_encode($data);

?>