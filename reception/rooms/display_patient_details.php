<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$id=$data->patient_id;
$sql1="select patient_id from patient_registration where patient_id = '{$id}' or phone= '{$id}'  ";
$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$row1= mysqli_fetch_array($res1);
$patient_id=$row1['patient_id'];

$patient=array();


//current_date

$indate=date("Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$intime= date("h:i:sa");
$date_time = $indate."_".$intime;
//

$sql="SELECT * from beds_allotment ba,patient_registration p,room_category rc,ward w,beds b where ba.patient_id = '{$patient_id}' and ba.flag = 0 and ba.number_of_days is null and ba.patient_id=p.patient_id and w.ward_id=ba.ward_id and ba.bed_id=b.bed_id and ba.room_id=rc.room_id and b.ward_id = w.ward_id";

	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$num="SELECT SUM(number_of_days) as total_day,from_date as admited_date from beds_allotment WHERE patient_id = '{$patient_id}'  and flag=0 and number_of_days is not null";	
$num_res=mysqli_query($con,$num) or die(mysqli_error($con));
$row_res=	mysqli_fetch_array($num_res);
$total_days=$row_res['total_day'];
$admited_day=$row_res['admited_date'];
	if(mysqli_num_rows($res)>=1)	
   {
	$row = mysqli_fetch_array($res); 
	  $patient['bed_id'] = $row['bed_id'];
	  $patient['ward_id'] = $row['ward_id'];
	  $patient['ward_name'] = $row['ward_name'];
	  $patient['room_id'] = $row['room_id'];
	  $patient['room_name'] = $row['room_name'];
	  $patient['patient_id'] = $row['patient_id'];
	  $patient['patient_name'] = $row['patient_name'];
	  if($admited_day==null)
	  $patient['from_date'] = $row['from_date'];
	  else
	  $patient['from_date'] = $admited_day;
	  $patient['floor'] = $row['floor'];
	   $date = $row['from_date'];
	  $currdate=date("Y-m-d h:i:sa");
		
        $datetime1 = new DateTime($date);
		$datetime2 = new DateTime($currdate);
		$interval = $datetime1->diff($datetime2);
		$number_of_days=$interval->format('%a');
	 $patient['to_date'] = $currdate;
	 	 if($number_of_days==0)
		 $patient['number_of_days']=1;
		 else
	 $patient['number_of_days'] = $number_of_days+1;

	 if($number_of_days==0)
		 $patient['total_days']=1+$total_days;
		 else
	 $patient['total_days'] = $number_of_days+1+$total_days;

	 
	
	print json_encode($patient);
   }
   else{

   $patient['patient_id']="404";
   print json_encode($patient);

 }
   


?>