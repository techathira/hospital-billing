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
$query = $db->query("select * from patient_registration where patient_id LIKE '%".$searchTerm."%' ORDER BY patient_id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['patient_id'];
}
//return json data
echo json_encode($data);
?>