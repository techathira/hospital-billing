<?php 
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="patient")
{
	$user_id=(int)$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}


require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

 $display_src='img/profiles/';
$response=array();
if(isset($_FILES['file'])){

        $target_path = "../img/profiles/"; //Declaring Path for uploaded images
		$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        $unique_file_name =  md5(uniqid()) . "." . $ext[count($ext) - 1];// give unique name for each file
        $target_path = $target_path . $unique_file_name;//set the target  path with a new name of image
         
          if (($_FILES["file"]["size"] < 100000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {//if file moved to uploads folder
            	$file_target="$display_src/$unique_file_name";
                
                $sql2="update patient_registration set photo='{$file_target}' where patient_id='{$user_id}'";
				$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
				if($res2){

                    $response['updated_src']=$file_target;
                    $response['status_code']="200";
                    $response['statusText']="successfull";
                	print json_encode($response); 
				}

                
            } else {//if file was not moved.
            	$response['status_code']="404";
                $response['statusText']="Unsuccessfull";
                print json_encode($response); 
            }
        } else {//if file size and file type was incorrect.
            $response['status_code']="404";
                $response['statusText']="Unsuccessfull";
                print json_encode($response); 
        }


}
 


?>