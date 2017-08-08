<?php
require_once(../../database.php);
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