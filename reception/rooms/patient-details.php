<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hospital_management';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("select * from patient_registration where patient_id LIKE '".$searchTerm."%' or patient_name LIKE '".$searchTerm."%' or phone LIKE '".$searchTerm."%' ORDER BY patient_id ASC");
while ($row = $query->fetch_assoc()) {
    
	$data[] = $row['patient_id'];
    $data[] = $row['phone'];
    $data[] = $row['patient_name'];
	if(sizeof($data)>8)
		break;		
}
//return json data

echo json_encode($data);
?>