var app = angular.module('insurance', []);

app.controller('insurance_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_insurance={};
		$scope.add_insurance={};
		$scope.edit_insurance={};		
		
		
		//on load funtions
		
		$http.get("display_insurance.php")
                .success(function(data){
				     
                    $scope.display_insurance = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		
		// add users
        $scope.insurance_add = function() {
						$http({     
						                method : 'POST' ,
										url: 'add_insurance.php',
										data: $scope.add_insurance
										
								}).success(function(data){
							            
										$scope.display_insurance = data;
										angular.element('#add_insurance').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific user
         $scope.insurance_edit = function(insurance_id) {
                   
                                 			
													$http.post("edit_insurance.php",{insurance_id : insurance_id})
														.success(function(data,status,headers,config){
														   
														   $scope.edit_insurance = data;
															
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update doctor
	   
	   
		$scope.update_insurance = function() {
		
		              
					  $http({     
						                method : 'POST' ,
										url: 'update_insurance.php',
										data:$scope.edit_insurance
										
								}).success(function(data){
									    
										$scope.display_insurance = data;
										
										angular.element('#edit_insurance').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.insurance_delete = function(insurance_id) {
								
								$scope.insurance_id=insurance_id;
								 
                                $http.post("delete_insurance.php",{insurance_id : $scope.insurance_id})
														.success(function(data,status,headers,config){
														      $scope.display_insurance = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };

     
}]);
