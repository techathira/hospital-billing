<?php 
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="patient")
{
	$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$doctor_id=$data->doctor_id;
$apt_date=$data->apt_date;
$date='';
/* check date filter was choosen or not */
if(!isset($apt_date)){

  $date = date('Y-m-d');
  $timestamp = strtotime($date);
  $day = date('l', $timestamp);

}else{
 
     $date=date($data->apt_date);
     $timestamp = strtotime($date);
     $day = date('l', $timestamp);


}
//get current day id
$sql = "SELECT * from day where day='{$day}'";
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$day_id = $row['day_id'];

$available_slots=[];
if(isset($day_id)){

		$sql2 = "SELECT ds.slot_id , ds.time,doc.doctor_id, doc_ses.name, doc.doctor_name FROM doctor_slot ds, doctor_timing dt, day d, doctors doc, doctor_session doc_ses WHERE ds.timing_id=dt.timing_id and dt.session_id=doc_ses.session_id and dt.doctor_id = doc.doctor_id and dt.day_id=d.day_id and ds.active=1 and doc.doctor_id='{$doctor_id}' and d.day_id='{$day_id}' and NOT EXISTS
(
   SELECT  pa.* FROM patient_appointment pa
   WHERE  pa.slot_id = ds.slot_id and pa.date = '{$date}' 
)";

		$result2 = mysqli_query($con, $sql2 )or die(mysqli_error($con));
		while($row=mysqli_fetch_array($result2)){

              if($row['name']=="Morning"){
              			$available_slots['Morning'][]=$row;
              }
              elseif ($row['name']=="Afternoon"){
               
                		$available_slots['Afternoon'][]=$row;	
				}
				elseif ($row['name']=="Evening") {

						$available_slots['Evening'][]=$row;	
					
				}elseif($row['name']=="Night"){

						$available_slots['Night'][]=$row;
				}
                    

		}


		
$response['available_slots']= $available_slots;
$response['date']=$date;
$response['doctor_id']=$doctor_id;

}




print json_encode($response);
/*

*/



?>