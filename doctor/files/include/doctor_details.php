<?php
session_start();
require_once("../../database.php");
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
	$doctor_id=$_SESSION['user_id'];
	$sql="SELECT d.doctor_name,d.fee,d.photo,COUNT(pa.doctor_id) as total,(SELECT COUNT(pa.doctor_id) from doctors d,patient_appointment pa WHERE d.doctor_id='{$doctor_id}' and pa.doctor_id=d.doctor_id and pa.checkup_status=0) as remaining,(SELECT COUNT(pa.doctor_id) from doctors d,patient_appointment pa WHERE d.doctor_id='{$doctor_id}' and pa.doctor_id=d.doctor_id and pa.date=CURDATE()) as today,(SELECT COUNT(pa.doctor_id) from doctors d,patient_appointment pa WHERE d.doctor_id='{$doctor_id}' and pa.doctor_id=d.doctor_id and MONTH(pa.date) = MONTH(CURRENT_DATE())) as this_month,(SELECT COUNT(pa.doctor_id) from doctors d,patient_appointment pa WHERE d.doctor_id='{$doctor_id}' and pa.doctor_id=d.doctor_id and pa.date between date_sub(now(),INTERVAL 1 WEEK) and now()) as this_week from doctors d,patient_appointment pa WHERE d.doctor_id='{$doctor_id}' and pa.doctor_id=d.doctor_id";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$send['doctor_info']=$row;
	
	// appointment in days for current week
	$asql="select dy.day,COUNT(pa.doctor_id) as total from day dy left join doctor_timing dt on dy.day_id = dt.day_id LEFT join doctors d on d.doctor_id = dt.doctor_id AND d.doctor_id='{$doctor_id}' LEFT join doctor_slot ds on ds.timing_id=dt.timing_id LEFT join patient_appointment pa on pa.slot_id=ds.slot_id AND pa.doctor_id=d.doctor_id AND YEARWEEK(pa.date, 1) = YEARWEEK(CURDATE(), 1) GROUP BY dy.day_id";
	$ares=mysqli_query($con,$asql) or die(mysqli_error($con));
	$i=0;
	while($arow=mysqli_fetch_array($ares,MYSQLI_ASSOC)){
		
		$send['appointment_info'][$i]=$arow;
		if($arow['total']==0)
			$send['appointment_info'][$i]['width']=0;
		if($arow['total']>=1 && $arow['total']<=10)
			$send['appointment_info'][$i]['width']=10;
		if($arow['total']>=11 && $arow['total']<=20)
			$send['appointment_info'][$i]['width']=20;
		if($arow['total']>=21 && $arow['total']<=30)
			$send['appointment_info'][$i]['width']=30;
		if($arow['total']>=31 && $arow['total']<=40)
			$send['appointment_info'][$i]['width']=40;
		if($arow['total']>=41 && $arow['total']<=50)
			$send['appointment_info'][$i]['width']=50;
		if($arow['total']>=51 && $arow['total']<=60)
			$send['appointment_info'][$i]['width']=60;
		if($arow['total']>=61 && $arow['total']<=70)
			$send['appointment_info'][$i]['width']=70;
		if($arow['total']>=71 && $arow['total']<=80)
			$send['appointment_info'][$i]['width']=80;
		if($arow['total']>=81 && $arow['total']<=90)
			$send['appointment_info'][$i]['width']=90;
		if($arow['total']>=91)
			$send['appointment_info'][$i]['width']=100;
		$i++;
	}
	$j=0;
	$ssql="select ds.name,COUNT(pa.appointment_id) as session_count from doctor_session ds left join doctor_timing dt on ds.session_id = dt.session_id AND dt.doctor_id='{$doctor_id}' left join doctor_slot dsl on dsl.timing_id=dt.timing_id left join patient_appointment pa on pa.slot_id=dsl.slot_id AND pa.doctor_id=1 AND pa.date=CURRENT_DATE() GROUP by ds.session_id";
	$sres=mysqli_query($con,$ssql) or die(mysqli_error($con));
	while($srow=mysqli_fetch_array($sres,MYSQLI_ASSOC)){
		$send['session_info'][$j]=$srow;
		if($srow['session_count']==0)
			$send['session_info'][$j]['width']=0;
		if($srow['session_count']>=1 && $srow['session_count']<=10)
			$send['session_info'][$j]['width']=10;
		if($srow['session_count']>=11 && $srow['session_count']<=20)
			$send['session_info'][$j]['width']=20;
		if($srow['session_count']>=21 && $srow['session_count']<=30)
			$send['session_info'][$j]['width']=30;
		if($srow['session_count']>=31 && $srow['session_count']<=40)
			$send['session_info'][$j]['width']=40;
		if($srow['session_count']>=41 && $srow['session_count']<=50)
			$send['session_info'][$j]['width']=50;
		if($srow['session_count']>=51 && $srow['session_count']<=60)
			$send['session_info'][$j]['width']=60;
		if($srow['session_count']>=61 && $srow['session_count']<=70)
			$send['session_info'][$j]['width']=70;
		if($srow['session_count']>=71 && $srow['session_count']<=80)
			$send['session_info'][$j]['width']=80;
		if($srow['session_count']>=81 && $srow['session_count']<=90)
			$send['session_info'][$j]['width']=90;
		if($srow['session_count']>=91)
			$send['session_info'][$j]['width']=100;
		$j++;
	}
	
	//var_dump($send['appointment_info']);
	//var_dump($total);
 print json_encode($send);
}
else{
	header('Location: ../../login/index.html');
	die();	
}




?>