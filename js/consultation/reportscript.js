var app = angular.module('reports', []);

app.controller('reports_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_doctor={};
        $scope.display_specialization={};
		$scope.add_doct={};
		$scope.edit_doct={};
		$scope.total=0;
		$scope.totalamt=0;
		$scope.packageamt=0;
		
        		
		
		$scope.patient_add={};
		$scope.patient_details={};
		$scope.op={};
		$scope.ip={};
		$scope.testdetails={};
		$scope.package1={};
		$scope.receptionists={};
		$scope.testamount=0;
		
		$scope.display_ip={};
		$scope.show_test=false;
		$scope.show_package=false;
		$scope.show_ip=false;
		$scope.show_op=true;
		
		$scope.show_op_div=false;
		$scope.show_ip_div=false;
		$scope.show_package_div=false;
		$scope.show_test_div=false;
		
		
		$scope.get_ip_report=function(){ 
								$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_op=false;
						$scope.show_ip=true;
		};
		$scope.get_op_report=function(){
								$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=true;
		};
		$scope.get_tests_report=function(){
								$scope.show_test=true;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=false;
		};
		$scope.get_package_report=function(){
								$scope.show_test=false;
						$scope.show_package=true;
						$scope.show_ip=false;
						$scope.show_op=false;
		};
		
		
		$http({     
						                method : 'POST' ,
										url: 'get_receptionists.php',
										
										
								}).success(function(data){
										$scope.receptionists=data;
					                
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
		
		 $scope.cash=0;
		                $scope.card=0;
        $scope.display_doctor_reports = function() {
			
			
		                $scope.total=0;
		                $scope.cash=0;
		                $scope.card=0;
		                
								$scope.show_op_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'op_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_op=data;
										console.log(data);
										for(var i in data)
										{
							                	 	$scope.total+= parseInt(data[i][6],10);	     
							                	 	
										}
										console.log($scope.total);
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
	    };
		
     
}]);
