<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$sql="select * from services";
$data=array();
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
	$data[]=$row;	
}
print json_encode($data);

?>