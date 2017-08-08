<?php
	$con=mysqli_connect("localhost","root","","hospital_management");
	if(!$con)
	{
		echo "Error".mysqli_connect_errno();
	}
	

?>