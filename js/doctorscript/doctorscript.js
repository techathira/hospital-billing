var app = angular.module('doctor', []);

app.controller('doctor_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_doctor={};
		$scope.add_doct={};
		$scope.edit_doct={};		
		
		
		//on load funtions
		
		$http.get("display_doctor.php")
                .success(function(data){
				 
                    $scope.display_doctor = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		
		// add doctors
        $scope.add_doctor = function() {
		               
						$http({     
						                method : 'POST' ,
										url: 'add_doctor.php',
										data: $scope.add_doct
										
								}).success(function(data){
							 
										$scope.display_doctor = data;
										angular.element('#adddoctor').modal('hide');
							            $scope.add_doct="";
										 
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

       //update doctor
	   
	   
		$scope.update_doctor = function() {
		
		             
					  $http({     
						                method : 'POST' ,
										url: 'update_doctor.php',
										data:$scope.edit_doct
										
								}).success(function(data){
						
										$scope.display_doctor = data;
										angular.element('#editdoctor').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.delete_doctor = function(doctor_id) {
				
								$scope.doctor_id=doctor_id;
                                $http.post("delete_doctor.php",{doctor_id : $scope.doctor_id})
														.success(function(data,status,headers,config){
														      $scope.display_doctor = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };

     
}]);
