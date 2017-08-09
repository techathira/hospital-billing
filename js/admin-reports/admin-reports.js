var app = angular.module('reports', []);

app.controller('reports_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
		$scope.ip_data={}; 
        $scope.display_service={};
		$scope.add_service={};
		$scope.edit_service={};		
		 $scope.show_div = false;
		   $scope.service={};
		 $scope.disp_service=[];
		
		//on load funtions
		
     	
		
		
		// Getting Ip reports
        $scope.get_ip_report = function() {
	
        
                            					   
						$http({     
						                method : 'POST' ,
										url: 'ip_patient_report.php',
										
										
										
								}).success(function(data){
							            
										$scope.ip_data = data;
										
							        
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		        $scope.get_op_report = function() {
	
        
                            					   
						$http({     
						                method : 'POST' ,
										url: 'ip_patient_report.php',
										
										
										
								}).success(function(data){
							            
										$scope.ip_data = data;
										
							        
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		

		

		
		
		
}]);
