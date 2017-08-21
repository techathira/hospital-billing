<?php
require_once("../../database.php");
session_start();
$patient_id=$_SESSION['patient_id'];
$appointment_id=$_SESSION['appointment_id'];
$data = json_decode(file_get_contents("php://input"));
for($i=0;$i<sizeof($data);$i++){

	if($i==0){
	$mbf=isset($data[$i]->mbf) ? '1' : '0';
	$maf=isset($data[$i]->maf) ? '1' : '0';
	$abf=isset($data[$i]->abf) ? '1' : '0';
	$aaf=isset($data[$i]->aaf) ? '1' : '0';
	$nbf=isset($data[$i]->nbf) ? '1' : '0';
	$naf=isset($data[$i]->naf) ? '1' : '0';
	$drug_id=$data[$i]->drug_id;
	$dosage=$data[$i]->dosage;
	
	$sql="insert into patient_prescription(appointment_id, drug_id, dosage, mbf, maf, abf, aaf, nbf, naf) values('{$appointment_id}','{$drug_id}','{$dosage}','{$mbf}','{$maf}','{$abf}','{$aaf}','{$nbf}','{$naf}') ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$prescription_id=mysqli_insert_id($con);
	}
	else {
	//$send[]=$data[$i];
	$mbf=isset($data[$i]->mbf) ? '1' : '0';
	$maf=isset($data[$i]->maf) ? '1' : '0';
	$abf=isset($data[$i]->abf) ? '1' : '0';
	$aaf=isset($data[$i]->aaf) ? '1' : '0';
	$nbf=isset($data[$i]->nbf) ? '1' : '0';
	$naf=isset($data[$i]->naf) ? '1' : '0';
	$drug_id=$data[$i]->drug_id;
	$dosage=$data[$i]->dosage;
	
	
		$update_sql="UPDATE patient_prescription SET drug_id=CONCAT(drug_id, ',', '{$drug_id}'),dosage=CONCAT(dosage, ',', '{$dosage}'),mbf=CONCAT(mbf, ',', '{$mbf}'),maf=CONCAT(maf, ',', '{$maf}'),abf=CONCAT(abf, ',', '{$abf}'),aaf=CONCAT(aaf, ',', '{$aaf}'),nbf=CONCAT(nbf, ',', '{$nbf}'),naf=CONCAT(naf, ',', '{$naf}') WHERE prescription_id='{$prescription_id}'";
		$update_res=mysqli_query($con,$update_sql) or die(mysqli_error($con));
	}
}
	$sql="UPDATE doctor_slot ds,patient_appointment pa SET pa.checkup_status=1,ds.status=0 WHERE pa.appointment_id='{$appointment_id}' and pa.slot_id=ds.slot_id";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	
unset($_SESSION['patient_id']);
unset($_SESSION['appointment_id']);

print json_encode(1);
//print json_encode($patient_id);
?>