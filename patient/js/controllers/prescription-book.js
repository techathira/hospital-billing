var app = angular.module('book-appointment', []);

app.controller('prescrbook_controller', ['$scope', '$http','$window', function ($scope, $http,$window) {
        
        /*$scope.patient_history={};
		$http.get("includes/get-booking-hostory.php")
						.success(function(data){
							$scope.patient_history = data;
							console.log($scope.patient_history)
				
						})
						.error(function() {
							$scope.data = "error in fetching data";
		});

  */

  $scope.check_prescription=function(){

      	angular.element('#prescription-modal').modal('show');

  }

     
}]);
