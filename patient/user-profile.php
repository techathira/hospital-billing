
   <?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='patient') {

}
else{
    header('Location: ../login/index.html');
    die();  
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="
    img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="
    img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>User Dashboard by Hospital Name</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>
    
    <link href="css/style.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/themify-icons.css" rel="stylesheet">



     <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
     <script src="js/angular.min.js"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyATUxnXEYwOrIyMOJ8c5Q0rLl8upLH--LQ"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="js/paper-dashboard.js"></script>


</head>
<body ng-app="book-appointment" ng-controller="profile_controller">

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Hospital Name
                </a>
            </div>

            <ul class="nav">
                
                <li>
                    <a href="index.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Book a Doctor</p>
                    </a>
                </li>
                  <li>
                    <a href="prescription-book.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Prescription Book</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user-profile.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="booking-history.php">
                        <i class="ti-text"></i>
                        <p>Booking History</p>
                    </a>
                </li>
              
              
                <li>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                       <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-settings"></i>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a  href="../login/logout.php">logout</a></li>
                                <li><a data-toggle="modal" data-target="#change_password">Change Password</a></li>
                              </ul>
                        </li>
					
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content" ng-Cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                          
                                <div class="author">
                                     
                                        <div class="image-container">
                                                 <img class="avatar border-white profile-pic" ng-src="{{patient_details.personal.profile_pic}}" alt="..."/>
                                                   <div class="after"><center><div style="    margin-top: 3em;" ng-click="uploadfile()" class="ti-upload" ></div></center>
                                                   </div>
                                                   <div >
                                                        <button ng-show="show_save_btn" ng-click="uploadFile()">save me</button>
                                                        {{myFile.name}}
                                                   </div>
                                        </div>
                                  <!-- Hidden file button -->
                                         <div class="form-group" style="display:none;" > 
                                        <input type="file" name="file"  id="upload"  file-model="myFile" >
                                        </div>
                                          
                              
                                  <h4 class="title">{{patient_details.personal.patient_name}}<br />
                                     <a href="#"><small>{{patient_details.personal.email}}</small></a>
                                  </h4>
                                </div>
                            
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5>12<br /><small>Files</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>2GB<br /><small>Used</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>24,6$<br /><small>Spent</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Family  Members</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                            <li ng-repeat="each_asso in patient_details.associated ">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="
                                                            img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        {{each_asso.patient_name}}
                                                        <br />
                                                        <span class="text-muted"><small>Offline</small></span>
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon" ng-click="switch_profile(each_asso.patient_id)"><i class="fa ti-angle-double-right"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                        
                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form name="update_profile" ng-submit="update_profile_details()">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Phone No</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="phone" ng-model="patient_details.personal.phone">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" ng-model="patient_details.personal.patient_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" ng-model="patient_details.personal.email">
                                            </div>
                                        </div>
                                    </div>

                                 

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" ng-model="patient_details.personal.address">
                                            </div>
                                        </div>
                                    </div>

                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="text" class="form-control border-input" placeholder="City" disabled value="Melbourne">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DOB</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" disabled value="Australia">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Current disease</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
            
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://athiratechnologies.com" target="_blank">Athira Technologies</a>
                </div>
            </div>
        </footer>

    </div>
</div>

<!-- Modal -->
<div id="change_password" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card" style="box-shadow:none;">
                            <div class="header text-center">
                                <h3 class="title">Change Password</h3>
                                <p class="category"></p>
                                <br>
                            </div>
                             <form class="form-horizontal" name="changepassword"  ng-submit="change_password()" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Enter Old Password</label>
                                                 <input type="password" name="oldpassword"  class="form-control border-input" ng-model="password.old"  required old-password />
                                                 <span ng-show="changepassword.oldpassword.$error.oldPassword">Old Password is Incorrect</span>

                                            </div>
                                        </div>
                                     </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Enter New Paasword</label>
                                                <input type="password" class="form-control border-input"  ng-model="password.newpassword" required />
                                            </div>
                                        </div>
                                      </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Re-enter New Password</label>
                                                 <input type="password" class="form-control border-input"  ng-model="password.reenter" ng-match="password.newpassword" required   />
                                                  <span class="font-red font-12" ng-show="password.newpassword != password.reenter">Confirm Password should match with New Password</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" ng-disabled="password.newpassword != password.reenter" class="btn btn-info btn-fill btn-wd">Update</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

      </div>
    
    </div>

  </div>
</div>
        

    <!-- Modal enfd here -->
  <!-- Angular Stuff -->
    
     <script src="js/controllers/patient-profile.js"  type="text/javascript"></script>
       <script src="js/directives/custom-directives.js" type="text/javascript"></script>
       <script src="js/services/profile-services.js" type="text/javascript"></script>

   <!-- Angular Stuff End here -->
    <!--  Chage password Link -->


</body>

   




</html>
