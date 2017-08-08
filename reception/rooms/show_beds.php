<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$ward_id=$data->ward_id;
$sql="select * from beds b,ward w,room_category rc where rc.room_id=w.room_id and w.ward_id=b.ward_id and b.ward_id='{$ward_id}' and b.status=0 ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$beds=array();
	while ($row = mysqli_fetch_array($res)) {
	  $beds[] = $row;
	}
	print json_encode($beds);

?>