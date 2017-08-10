var app = angular.module('previous', []);

app.controller('previous_controller', ['$scope', '$http', function ($scope, $http) {

		$scope.display_patient={};
		$scope.display_patient_test={};
       
	//div show hide
	    $scope.show_op_bill=true;
	    $scope.show_ip_bill=false;
	    $scope.show_test_bill=false;
	    $scope.show_package_bill=false;
		
	//op previous bill 	
			
	$scope.get_op_bill=function(){
						$scope.show_op_bill=true;
						 $scope.show_ip_bill=false;
						$scope.show_test_bill=false;
						$scope.show_package_bill=false;
						$scope.cashtotalamt=0;
	   $scope.cardtotalamt=0;
	    $scope.totalamt=0;
						$http.post("prebill.php")
								.success(function(data){
									 
									$scope.display_patient=data;
									 var total=0; 
									 var cashtotal=0; 
									 var cardtotal=0; 
										
									
									 	for(var i in data){
											
										 
										   cashtotal += parseInt(data[i][3],10);
										   cardtotal += parseInt(data[i][4],10);
										     total += parseInt(data[i][6],10);
										}
                                        $scope.totalamt=total;
                                        $scope.cashtotalamt=cashtotal;
                                        $scope.cardtotalamt=cardtotal;
										
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
	};
	//op bill ends here
	//ip bill 
	$scope.get_ip_bill=function(){
				 $scope.show_op_bill=false;
				$scope.show_ip_bill=true;
				$scope.show_test_bill=false;
				$scope.show_package_bill=false;
				$scope.cashtotalamt_ip=0;
	   $scope.cardtotalamt_ip=0;
	    $scope.totalamt_ip=0;
						$http.post("ipprebill.php")
								.success(function(data){
									 
									$scope.display_patient_ip=data;
									
									 var total_ip=0; 
									 var cashtotal_ip=0; 
									 var cardtotal_ip=0; 
										
									
									 	for(var i in data){
											
										 
										   cashtotal_ip += parseInt(data[i][4],10);
										   cardtotal_ip += parseInt(data[i][5],10);
										     total_ip += parseInt(data[i][8],10);
										}
                                        $scope.totalamt_ip=total_ip;
                                        $scope.cashtotalamt_ip=cashtotal_ip;
                                        $scope.cardtotalamt_ip=cardtotal_ip;
										
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
	};
	//ip bill ends here
	 // test bill

	$scope.get_tests_bill=function(){
								 $scope.show_op_bill=false;
								$scope.show_ip_bill=false;
								$scope.show_test_bill=true;
								$scope.show_package_bill=false;
								 $scope.cashtotalamt_test=0;
								$scope.cardtotalamt_test=0;
								$scope.totalamt_test=0;
		                       $http.post("testprebill.php")
								.success(function(data){
									 
									$scope.display_patient_test=data;
									
									 var total_test=0; 
									 var cashtotal_test=0; 
									 var cardtotal_test=0; 
										
									
									 	for(var i in data){
											
										 
										   cashtotal_test += parseInt(data[i][3],10);
										   cardtotal_test += parseInt(data[i][4],10);
										     total_test += parseInt(data[i][6],10);
										}
                                        $scope.totalamt_test=total_test;
                                        $scope.cashtotalamt_test=cashtotal_test;
                                        $scope.cardtotalamt_test=cardtotal_test;
										
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
	};
	//test bill ends here
	
	//package bill 
	$scope.get_package_bill=function(){
							 $scope.show_op_bill=false;
							$scope.show_ip_bill=false;
							$scope.show_test_bill=false;
							$scope.show_package_bill=true;
							$scope.cashtotalamt_package=0;
							$scope.cardtotalamt_package=0;
							$scope.totalamt_package=0;
		                       $http.post("packageprebill.php")
								.success(function(data){
									 
									$scope.display_patient_package=data;
									
									 var total_package=0; 
									 var cashtotal_package=0; 
									 var cardtotal_package=0; 
										
									
									 	for(var i in data){
											
										 
										   cashtotal_package += parseInt(data[i][7],10);
										   cardtotal_package += parseInt(data[i][8],10);
										     total_package += parseInt(data[i][12],10);
										}
                                        $scope.totalamt_package=total_package;
                                        $scope.cashtotalamt_package=cashtotal_package;
                                        $scope.cardtotalamt_package=cardtotal_package;
										
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
	};
	//package bill ends here
	
	//div show hide ends here

	//op print section
		 $scope.printsection=function(bill_no) {
		 
              	$http.post("patient_details.php",{bill_no:bill_no})
														.success(function(data,status,headers,config){
													
														   $scope.make_payment= data;
													      
														}).error(function(data, status) {
														   alert("error");
													   });  
							  
							  $http({     
						                method : 'POST' ,
										url: 'op_make_payment.php',
										data: {bill_no:bill_no}
										
								}).success(function(data){						
														$scope.show_service_taken=data;
															
														
														   setTimeout(function(){
														var innerContents = document.getElementById("printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											
											
											
														   
														   
														
														}).error(function(data, status) {
														   alert("Not Done Try Again");
													   });  
		 };
		 
	//op print ends
	//ip print section
		 $scope.ipprintsection=function(bill_no) {
		 
              	$http.post("patient_details_ip.php",{bill_no:bill_no})
														.success(function(data,status,headers,config){
													
														   $scope.make_payment_ip= data;
													      
														}).error(function(data, status) {
														   alert("error");
													   });  
							  
							  $http({     
						                method : 'POST' ,
										url: 'ip_make_payment.php',
										data: {bill_no:bill_no}
										
								}).success(function(data){						
														$scope.show_ip_taken=data;
															
														
														   setTimeout(function(){
														var innerContents = document.getElementById("ip_printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											
											
											
														   
														   
														
														}).error(function(data, status) {
														   alert("Not Done Try Again");
													   });  
		 };
		 
	//ip print ends
	//test print section
		 $scope.test_printsection=function(lab_billno) {
		 
              	$http.post("patient_details_test.php",{lab_billno:lab_billno})
														.success(function(data,status,headers,config){
													
														   $scope.test_make_payment= data;
													      
														}).error(function(data, status) {
														   alert("error");
													   });  
							  
							  $http({     
						                method : 'POST' ,
										url: 'op_lab_test.php',
										data: {lab_billno:lab_billno}
										
								}).success(function(data){						
														$scope.show_test_taken=data;
														
														
														   setTimeout(function(){
														var innerContents = document.getElementById("test_printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											
											
											
														   
														   
														
														}).error(function(data, status) {
														   alert("Not Done Try Again");
													   });  
		 };
		 
	//test print ends
	//package print section
		 $scope.package_printsection=function(package_billno) {
		 
              	$http.post("patient_details_package.php",{package_billno:package_billno})
														.success(function(data,status,headers,config){
													
														   $scope.package_make_payment= data;
													       setTimeout(function(){
														var innerContents = document.getElementById("package_printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
														}).error(function(data, status) {
														   alert("error");
													   });  
							  
							 
		 };
		 
	//package print ends
	
	
	
}]);
