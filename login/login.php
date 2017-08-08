<?php
session_start();
require_once("../database.php");
//$data = json_decode(file_get_contents("php://input"));

$username=$_POST['username'];
$password=$_POST['password'];
	
	$sql="select * from users where username='{$username}' and password='{$password}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	
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
		else
		if($type=="Lab")
		{
			//redirect to lab dashboard;
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
		echo '<script type="text/javascript">alert("'.$username.' or '.$type.' not matched!!");
			window.location="index.html";
		</script>';
		//header("location:index.html");
		//exit();
	}

   // print json_encode($num);
   
?>