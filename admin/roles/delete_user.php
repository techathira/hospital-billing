<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$user_id=$data->user_id;

$sql="delete from users where user_id= '{$user_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));


if($res)
{
	$sql="select * from users";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$users=array();
	while ($row = mysqli_fetch_array($res)) {
	  $users[] = $row;
	}
	print json_encode($users);
}
else
{
	$send="Previus details not Updated!!";
	print json_encode($send);
}

?>
