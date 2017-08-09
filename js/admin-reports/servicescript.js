var app = angular.module('service', []);

app.controller('service_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_service={};
		$scope.add_service={};
		$scope.edit_service={};		
		 $scope.show_div = false;
		   $scope.service={};
		 $scope.disp_service=[];
		
		//on load funtions
		
     	
		
		$http.get("display_service.php")
                .success(function(data){
				  
                    $scope.display_service = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		  // add temp service
		   $scope.add_temp_service = function() {
			    $scope.show_div = true;
		        $scope.disp_service.push({service_name :$scope.service.service_name,price : $scope.service.price});
				$scope.service.name='';
				$scope.service.price='';
						  
		};
		$scope.delete_temp_service = function(name) {
			    
		        $scope.disp_service.splice(name);
						  
		};
		  
		// add services
		$scope.services={};
		
        $scope.add_service = function() {
		$scope.services=$scope.disp_service;
        
                            					   
						$http({     
						                method : 'POST' ,
										url: 'add_service.php',
										data: $scope.services
										
										
								}).success(function(data){
							            
										$scope.display_service = data;
										angular.element('#add_service').modal('hide');
							            $scope.services="";
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific service
         $scope.edit_service = function(service_id) {
                   
                                 				 
													$http.post("edit_service.php",{service_id : service_id})
														.success(function(data,status,headers,config){
														  
														   $scope.edit_service = data;
														 
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update service
	   
	   
		$scope.update_service = function() {
		
		    
					  $http({     
						                method : 'POST' ,
										url: 'update_service.php',
										data:$scope.edit_service
										
								}).success(function(data){
									    
										$scope.display_service = data;
										angular.element('#edit_service').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete service
	      $scope.delete_service = function(service_id) {
								
								$scope.service_id=service_id;
								
                                $http.post("delete_service.php",{service_id : $scope.service_id})
														.success(function(data,status,headers,config){
															
														      $scope.display_service = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };

		
		
		
}]);
