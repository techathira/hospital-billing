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
$pagenum = $_GET['page'];
$pagesize = $_GET['size'];
$offset = ($pagenum - 1) * $pagesize;
$search = $_GET['search'];

if ($search != "") {
    $where = "WHERE doctor_name LIKE '%" . $search . "%' or specialization LIKE '%" . $search . "%' ";
} else {
    $where = "";
}

$sql = "SELECT COUNT(*) AS count FROM doctors $where";
$result = mysqli_query($con, $sql )or die(mysqli_error($con));

$row=mysqli_fetch_array($result);
$count = $row['count'];

$query = "SELECT * FROM doctors $where ORDER BY doctor_name, phone LIMIT $offset, $pagesize";
$result2 = mysqli_query($con, $query )or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result2)) {
    $doctors[] = $row;
}

$myData = array('doctors' => $doctors, 'totalCount' => $count);

print json_encode($myData);

?>