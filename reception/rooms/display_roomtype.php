<?php 
require_once("../../database.php");
$sql=" SELECT * FROM room_category";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$category=array();
while($row= mysqli_fetch_array($res))
{
    $category[]=$row;
	
}
print json_encode($category);
?>