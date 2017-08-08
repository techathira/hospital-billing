var app = angular.module('refered_doc', []);

app.controller('refered_doc_controller', ['$scope', '$http', function ($scope, $http) {
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
		
		
		$scope.show_op_div=false;
		$scope.show_ip_div=false;
		$scope.show_package_div=false;
		$scope.show_test_div=false;
		
		
		$scope.oprefdoc=function(){ 
		 
								$scope.show_op_div=true;
								$scope.show_ip_div=false;
								$scope.show_package_div=false;
								$scope.show_test_div=false;
		};
		$scope.iprefdoc=function(){
			  
								$scope.show_op_div=false;
								$scope.show_ip_div=true;
								$scope.show_package_div=false;
								$scope.show_test_div=false;
		};
		$scope.testrefdoc=function(){
			 
								$scope.show_op_div=false;
								$scope.show_ip_div=false;
								$scope.show_package_div=false;
								$scope.show_test_div=true;
		};
		$scope.packagerefdoc=function(){
			             		$scope.show_op_div=false;
								$scope.show_ip_div=false;
								$scope.show_package_div=false;
								$scope.show_test_div=false;
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
		                $scope.iptotal=0;
		                $scope.testtotal=0;
		                $scope.packagetotal=0;
		               
		                
								
			      
						$http({     
						                method : 'POST' ,
										url: 'op_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_op=data;
										
										$scope.show_op_div=true;
										$scope.show_ip_div=false;
										$scope.show_package_div=false;
										$scope.show_test_div=false;
										for(var i in data)
										{
							                	 	$scope.total+= parseInt(data[i][3],10);	     
							                	 	
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
					   $http({     
						                method : 'POST' ,
										url: 'ip_patient_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_ip=data;
										
										
										for(var i in data)
										{
							                	 	$scope.iptotal+= parseInt(data[i][3],10);	     
							                	 	
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
					   $http({     
						                method : 'POST' ,
										url: 'op_test_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_test=data;
										console.log(data);
										
										for(var i in data)
										{
							                	 	$scope.testtotal+= parseInt(data[i][3],10);	     
							                	 	
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
					   
					   
	    };
		
     
}]);
