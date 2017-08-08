<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$id=$data->patient_id;
$sql1="select patient_id from patient_registration where patient_id = '{$id}' or phone= '{$id}'  ";
$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$row1= mysqli_fetch_array($res1);
$patient_id=$row1['patient_id'];

$sql="SELECT * FROM beds_allotment ba,patient_registration pr,room_category rc,ward w,beds b where ba.bed_id=b.bed_id and ba.ward_id=w.ward_id and ba.room_id=rc.room_id and ba.patient_id=pr.patient_id and b.ward_id=w.ward_id and pr.patient_id='{$patient_id}' and ba.to_date IS NULL";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($res)>=1)	
{
	$room=array();
	$row = mysqli_fetch_array($res);
	  $date = $row['from_date'];
	 /* $date1=(explode("_",$date));
	  $now = time(); // or your date as well
		$your_date = strtotime($date1[0]);
		$datediff = $now - $your_date;
		*/
		$currdate=date("Y-m-d h:i:sa");
		
        $datetime1 = new DateTime($date);
		$datetime2 = new DateTime($currdate);
		$interval = $datetime1->diff($datetime2);
		$number_of_days=$interval->format('%a');
		$room['patient_id'] = $row['patient_id'];
	  $room['room_id'] = $row['room_id'];
	  $room['patient_name'] = $row['patient_name'];
	  $room['insurance_id'] = $row['insurance_id'];
	  $room['room_name'] = $row['room_name'];
	  $room['ward_name'] = $row['ward_name'];
	  $room['ward_id'] = $row['ward_id'];
	  $room['bed_id'] = $row['bed_id'];
	  $room['from_date'] = $row['from_date'];
	  $room['floor'] = $row['floor'];
	  
	   	 if($number_of_days==0)
		 $room['number_of_days']=1;
		 else
	  $room['number_of_days'] = $number_of_days+1;
	
	print json_encode($room);
}
else{

   $room['patient_id']="404";
   print json_encode($room);

}



?>