<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$room_id=$data->roomid;
$sql="select rc.*,w.*,b.*,COUNT(b.status) as status from room_category rc,ward w,beds b where rc.room_id='{$room_id}' and rc.room_id=w.room_id and w.ward_id=b.ward_id and b.status=0 GROUP BY w.ward_id";

	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$room=array();
	while ($row = mysqli_fetch_array($res)) {
	  $room[] = $row;
	}
	print json_encode($room);



?>