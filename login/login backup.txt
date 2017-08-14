<?php
session_start();
require_once("../database.php");
//$data = json_decode(file_get_contents("php://input"));

if(isset($_POST['login'])) {
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$user_type=mysqli_real_escape_string($con,$_POST['user_type']);	
	
	if($user_type=="patient"){
		$stmt = $con->prepare('select * from patient_registration where phone=? and password=?');	
		$stmt->bind_param('is', $username,$password);
		$stmt->execute();
		$res = $stmt->get_result();
		if(mysqli_num_rows($res)>=1)
		{
			$row=mysqli_fetch_array($res);
			$_SESSION['name']="patient";
			$_SESSION['user_id']=$row['patient_id'];
			header('Location: ../patient/index.php');
			exit();
		}
		else {
			echo '<script type="text/javascript">alert("username or password not matched!!");
			window.location="index.html";
		</script>';
		}
	}
	else if($user_type=="doctor"){
		$stmt = $con->prepare('select * from doctors where email=? and password=?');	
		$stmt->bind_param('ss', $username,$password);
		$stmt->execute();
		$res = $stmt->get_result();
		if(mysqli_num_rows($res)>=1)
		{
			$row=mysqli_fetch_array($res);
			$_SESSION['name']="doctor";
			$_SESSION['user_id']=$row['doctor_id'];
			header('Location: ../doctor/index.php');
			exit();
		}
		else {
			echo '<script type="text/javascript">alert("username or password not matched!!");
			window.location="index.html";
		</script>';
		}
	}
	 else {
	/*$sql="select * from users where username='{$username}' and password='{$password}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));*/
	$stmt = $con->prepare('select * from users where username=? and password=?');	
	$stmt->bind_param('ss', $username,$password);
	$stmt->execute();
	$res = $stmt->get_result();
	
	if(mysqli_num_rows($res)>=1)
	{	
		$row=mysqli_fetch_array($res);
		$type=$row['type'];
		$user_id=$row['user_id'];
		
		if($type=="admin")
		{
			$_SESSION['name']="admin";
			$_SESSION['user_id']=$user_id;
			header('Location: ../admin/lab/index.php');
			exit();
			
		}
		else
		if($type=="OP")
		{
			$_SESSION['name']="OP";
				$_SESSION['user_id']=$user_id;
			header('Location: ../op-user/index.php');
			exit();
		}
		else if($type=="Reciptionist")
		{
			//redirect to Reciptionist dashboard;
			$_SESSION['name']="Reciptionist";
			$_SESSION['user_id']=$user_id;
			header('Location: ../reception/rooms/index.php');
			exit();
		}
		else if($type=="Accountant")
		{
			//redirect to Accountant dashboard;
			$_SESSION['name']="Accountant";
			$_SESSION['user_id']=$user_id;
			header('Location: ../accountant/report/index.php');
			exit();
		}
		else if($type=="Ip/Lab")
		{
			//redirect to Reciptionist dashboard;
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("username or password not matched!!");
			window.location="index.html";
		</script>';
		//header("location:index.html");
		//exit();
	}
	
	} //patient

	}
	
   // print json_encode($num);
   
?>