<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

 $doctor_id=$data->doctor_id;
for($i=0;$i<sizeOf($data->times);$i++)
 {
	 
     if($data->times[$i]->mor_session!=""  )
		{
           
			$sql_mor="INSERT INTO doctor_timing(doctor_id,day_id,session_id,from_time,to_time,doctor_interval) VALUES ('{$doctor_id}','{$data->times[$i]->day_id}','{$data->times[$i]->mor_session}','{$data->times[$i]->mor_start_time}','{$data->times[$i]->mor_end_time}','{$data->times[$i]->mor_interval}')";
			$result_mor = mysqli_query($con, $sql_mor )or die(mysqli_error($con));
		}
      if($data->times[$i]->aft_session!="" )
		{
            $sql_aft="INSERT INTO doctor_timing(doctor_id,day_id,session_id,from_time,to_time,doctor_interval) VALUES ('{$doctor_id}','{$data->times[$i]->day_id}','{$data->times[$i]->aft_session}','{$data->times[$i]->aft_start_time}','{$data->times[$i]->aft_end_time}','{$data->times[$i]->aft_interval}')";
			$result_aft = mysqli_query($con, $sql_aft )or die(mysqli_error($con));
		}
		 if($data->times[$i]->eve_session!="" )
		{
			$sql_eve="INSERT INTO doctor_timing(doctor_id,day_id,session_id,from_time,to_time,doctor_interval) VALUES ('{$doctor_id}','{$data->times[$i]->day_id}','{$data->times[$i]->eve_session}','{$data->times[$i]->eve_start_time}','{$data->times[$i]->eve_end_time}','{$data->times[$i]->eve_interval}')";
			$result_eve = mysqli_query($con, $sql_eve )or die(mysqli_error($con));
		}
	 if($data->times[$i]->nig_session!="" )
		{
		$sql_nig="INSERT INTO doctor_timing(doctor_id,day_id,session_id,from_time,to_time,doctor_interval) VALUES ('{$doctor_id}','{$data->times[$i]->day_id}','{$data->times[$i]->nig_session}','{$data->times[$i]->nig_start_time}','{$data->times[$i]->nig_end_time}','{$data->times[$i]->nig_interval}')";
			$result_nig = mysqli_query($con, $sql_nig)or die(mysqli_error($con));
		}
 }	 
print json_encode($data);

?>