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
$query = $db->query("select * from doctors where doctor_name LIKE '".$searchTerm."%' ORDER BY doctor_name ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['doctor_name'];
    
}
//return json data
echo json_encode($data);
?>