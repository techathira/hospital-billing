var app = angular.module('doctor', []);

app.controller('doctor_controller', ['$scope', '$http', function ($scope, $http) {
	
	 $scope.times=[
		 {'start_time':"10:00",'end_time':"12:00",'interval':"10"},
		 {'start_time':"11:00",'end_time':"12:00",'interval':"10"}
		 ];
			console.log($scope.times);
$scope.callclock=function(){
		   
				$('.clockpicker').clockpicker().find('input').change(function(){
		             var model = $(this).attr("ng-model");
					 $scope.attribname=model;
					  var input=$(this);
					 
					  input.trigger('input');
					  if($scope.attribname=="start_time")
					  {
					  $scope.model['start_time'] = this.value;
					  }
					  else{
						  $scope.model['end_time'] = this.value;
						  
					  }
					  
					  model.value=$scope.model;
					  $scope.$apply();
				});
			
			};
			
			}]);