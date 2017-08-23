var app = angular.module('dashboard', []);

app.controller('dashboardCtrl', ['$scope', '$http', function ($scope, $http) {

	//doctor  information 
	$http.get("include/doctor_details.php")
                .success(function(data){
				//console.log(data.session_info);
					
					$scope.doctor_info=data.doctor_info;
					$scope.appointment_info=data.appointment_info;
					$scope.session_info=data.session_info;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	

}]);

app.directive('datepicker', function() {
  return {
    require: 'ngModel',
    link: function(scope, el, attr, ngModel) {
      $(el).datepicker({
		dateFormat: 'yy-mm-dd' ,
        onSelect: function(dateText) {
          scope.$apply(function() {
            ngModel.$setViewValue(dateText);
          });
        }
      });
    }
  };
});