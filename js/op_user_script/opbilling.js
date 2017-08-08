var app = angular.module('patient', []);

app.controller('patient_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_doctor={};
        $scope.display_specialization={};
		$scope.add_doct={};
		$scope.edit_doct={};		
		
		
		//on load funtions
		$http.get("display_doctor.php")
						.success(function(doctor){
							 
							$scope.display_doctor = doctor;
						
						})
						.error(function() {
							$scope.data = "error in fetching data";
						});
						
						
		$http.get("display_specialization.php")
                .success(function(specialization){
				     
                    $scope.display_specialization = specialization;
               
				
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });	
		
		// on click funtions
		
		// add patient
		$scope.patient_add={};
		$scope.patient_details={};
        $scope.add_patient = function(dob) {
			      
						$http({     
						                method : 'POST' ,
										url: 'add_patient.php',
										data: $scope.patient_add
										
								}).success(function(data){
										$scope.patient_details=data;
										alert($scope.patient_details[0]);
										$scope.patient_id=$scope.patient_details.patient_id;
										
										console.log($scope.patient_details);
										angular.element('#add_patient').modal('hide');
							            alert("register successfully");
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific doctor
         $scope.edit_doctor = function(doctor_id) {
                   
                                 			
													$http.post("edit_doctor.php",{doctor__id : doctor_id})
														.success(function(data,status,headers,config){
														
														
														   $scope.edit_doct = data;
												
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //select doctor
	   $scope.take_op_appoint = function(doctor_id,patient_id) {
	   
	                                       
                                               $scope.d_id=doctor_id;
											   $scope.patient_id=patient_id;
                                 				$http.post("select_doctor.php",{doctor_id : $scope.d_id, patient_id : $scope.patient_id})
														.success(function(data,status,headers,config){
													
														   $scope.select_doctor = data;
													
														}).error(function(data, status) {
														   alert("error");
													   });  
      };
	   
      //select doctor
	   $scope.print_receipt = function() {
                                 				  
													$http({     
																method : 'POST' ,
																url: 'select_patient.php',
																data: $scope.select_doctor
														  })
														.success(function(data,status,headers,config){
														   angular.element('#select_doctor').modal('hide');
														   	$scope.screen_print = data;
														
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
	  
	   $http.get("display_service.php")
                .success(function(data){
				    
                    $scope.display_service = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	  
	  $scope.service_price = function() {
					 
								
						
						$http({     
						                method : 'POST' ,
										url: 'display_service_price.php',
										data: {service_id:$scope.service.list_service}
										
								}).success(function(data){
							             
										$scope.display_service_price = data;
										 		            
						       }).error(function(data, status) {
						                 alert("error");
					   });
	    };
     
}]);
