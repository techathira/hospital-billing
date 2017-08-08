<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$to_date=$data->todate;
$from_date=$data->fromdate;
$recep_id=$data->recep_id;
if($recep_id=="All")
{
$sql="select * from op_lab_tests_taken where  date between '{$from_date}' and '{$to_date}' order by  date ASC ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

	
}
else
{
$sql="select * from op_lab_tests_taken where user_id = '{$recep_id}' and date between '{$from_date}' and '{$to_date}' order by  date ASC ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>