var app = angular.module('reports', []);

app.controller('reports_controller', ['$scope', '$http', function ($scope, $http) {
$scope.total=0;
$scope.cashtotal=0;
$scope.cardtotal=0;
		$scope.show_table=false;
        $scope.displayreports = function() {
		
								$scope.total=0;
								$scope.cashtotal=0;
									$scope.cardtotal=0;
			      
						$http({     
						                method : 'POST' ,
										url: 'report.php',
										data: $scope.op 
										
								}).success(function(data){
										$scope.display_op=data;
										
										for(var i in data)
										{
										 
										     
											
							                	 	$scope.cashtotal+= parseInt(data[i][5],10);	     
										    
										    
							                	 	$scope.cardtotal+= parseInt(data[i][6],10);
													
										   
											     
										}
										 $scope.total=$scope.cardtotal+$scope.cashtotal;
										
										$scope.show_table=true;
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		
		

		 

}]);
