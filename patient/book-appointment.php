
<?php
		session_start();
		if(isset($_SESSION['name']) && $_SESSION['name']=='patient') {


		     $doctor_id=$_GET['doctor_id'];


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
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Athira Hospital Management</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>

   

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/themify-icons.css" rel="stylesheet">

     <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
     <script src="js/angular.min.js"></script>
       <script data-require="ui-bootstrap@*" data-semver="0.12.1" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.min.js"></script>
     <script type="text/javascript" src=""></script>  
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
<body ng-app="book-appointment" ng-controller="bookapt_controller">

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
                
                <li class="active">
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
                <li >
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
                                <li><a href="../login/logout.php">logout</a></li>
                                <li><a href="#">Change Password</a></li>
                              </ul>
                        </li>
                    
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-12 ">
                        <div class="card">
                            <div class="header text-center">
                                <h3 class="title"><div class="form-group">
                                                <label>Slots Avalable on</label>
                                                <input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search by name or specialization"ng-model="searchText" ng-change="searchTextChanged()">
                                </div></h3>
                                
                                <!-- <div class="col-md-12">
                                	<div class="col-md-4">sdads</div>
                                	<div class="col-md-4">asdasd</div>
                                	<div class="col-md-4">asdasdas</div>	
                                
                                </div> -->
								<br>
                            </div>
                            <div class="content table-responsive table-full-width table-upgrade">
                                <table class="table slots">
                                    <thead>
                                   
                                    	<th class="text-center">Morning</th>
                                    	<th class="text-center">Afternoon</th>
                                    	<th class="text-center">Evening</th>
                                    	<th class="text-center">Night</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>Components</td>
                                        	<td>16</td>
                                        	<td>160</td>
                                        	<td>160</td>
                                        </tr>
                                        <tr>
                                        	<td>Plugins</td>
                                        	<td>4</td>
                                        	<td>15</td>
                                        	<td>160</td>
                                        </tr>
                                        <tr>
                                        	<td>Example Pages</td>
                                        	<td>4</td>
                                        	<td>25</td>
                                        	<td>160</td>
                                        </tr>
                                        <tr>
                                        	<td>Documentation</td>
                                        	<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
                                        <tr>
                                        	<td>SASS Files</td>
											<td><i class="fa fa-check text-success"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
                                        <tr>
                                        	<td>Login/Register/Lock Pages</td>
											<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
										<tr>
                                        	<td>Premium Support</td>
											<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
										<tr>
                                        	<td></td>
											<td>Free</td>
                                        	<td>Just $39</td>
                                        </tr>
										<tr>
											<td></td>
											<td>
												<a href="#" class="btn btn-round btn-fill btn-default disabled">Current Version</a>
											</td>
											<td>
												<a target="_blank" href="http://www.creative-tim.com/product/paper-dashboard-pro/?ref=pdfree-upgrade-archive" class="btn btn-round btn-fill btn-info">Upgrade to PRO</a>
											</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>

      <!-- Angular Stuff -->
    
     <script src="js/controllers/book-appointment.js" type="text/javascript"></script>

   <!-- Angular Stuff End here -->






</body>

</html>

