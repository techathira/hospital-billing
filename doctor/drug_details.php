<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hospital_management';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

	$searchTerm = $_GET['term'];
	
	$sql=$db->query("select * from  prescription where name LIKE '".$searchTerm."%' ORDER BY drug_id ASC");
	
	while ($row = $sql->fetch_assoc()) {

    $data[] = $row['name'].':'.$row['drug_id'];
    
	if(sizeof($data)>8)
		break;		
}
//return json data

echo json_encode($data);
?>