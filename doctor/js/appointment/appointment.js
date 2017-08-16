var app = angular.module('view_appointment', []);

app.controller('appointmentCtrl', ['$scope', '$http', function ($scope, $http) {

	$scope.check_up = function() {
		window.location.href="checkup.php";
	};
     
}]);
