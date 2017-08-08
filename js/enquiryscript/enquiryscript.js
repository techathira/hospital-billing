var app = angular.module('enquiry', []);

app.controller('enquiry_controller', ['$scope', '$http', function ($scope, $http) {

		$scope.show_table=false;
        $scope.display_admited_patient = function() {
		
			      
						$http({     
						                method : 'POST' ,
										url: 'enquiry.php',
										
										
								}).success(function(data){
										$scope.display_patient=data;
										
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		
		

		 

}]);
