var app = angular.module('balance', []);

app.controller('balance_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
		$scope.show_all_inside=false;
		 $scope.devidebalance=false;
		$scope.totalamt=0;
		$scope.balance_bill_no={};
								$scope.payable={};
								$scope.des={};
								$scope.bal={};
				$scope.paymentmode={};				
			$scope.click_paymentmodepackage=function(id){
		   
		   
	
		      
			  if(id=="Cash" || id=="Card")
			  {
			    $scope.devidebalance=false;
			  }
			  else{
			   $scope.devidebalance=true;
			  
			  }
			};					
	      $(function() {
			  $("#patientid" ).autocomplete({
				  source: 'patient-details.php',
				  select: function( event, ui ) {
					
						var patient_id = ui.item.value;
						$scope.patient_id=patient_id;
						$scope.display_patient_details();
					 }	 
			  
			 });
		  });
         $scope.display_patient_details=function(){
		 
			$http({     
						                method : 'POST' ,
										url: 'balance_details.php',
										data: {patient_id : $scope.patient_id}
										
								}).success(function(data){
							            $scope.balance_patient=data;
										
										 var total=0; 
										
									 	for(var i in data){
											
										   total += parseInt(data[i][6],10);
										   
										}
                                        $scope.totalamt=total;
										$scope.show_all_inside=true;
						       }).error(function(data, status) {
						                 alert("error");
					   });
		   
	   };
	   
	   //print single
	   
	   $scope.balanceprint = function(bill_no,description,balance,paying) {
                          
							if(description=="OP Billing")
							{
								$scope.balance_bill_no=bill_no;
								$scope.payable=paying;
								$scope.des=description;
								$scope.bal=balance-$scope.payable;
								
							}
							if(description=="IP Billing")
							{
								$scope.balance_bill_no=bill_no;
								$scope.payable=paying;
								$scope.des=description;
								$scope.bal=balance-$scope.payable;
								
							}
							if(description=="TEST Billing")
							{
								$scope.balance_bill_no=bill_no;
								$scope.payable=paying;
								$scope.des=description;
								$scope.bal=balance-$scope.payable;
								
							}
							if(description=="PACKAGE Billing")
							{
								$scope.balance_bill_no=bill_no;
								$scope.payable=paying;
								$scope.des=description;
								$scope.bal=balance-$scope.payable;
								
							}				
      };
	  $scope.printbalance=function()
	  {
		    $http({     
						                method : 'POST' ,
										url: 'op_balance.php',
										data: {bill_no:$scope.balance_bill_no,balance:$scope.bal,description:$scope.des,paymentmode:$scope.paymentmode,paymode:$scope.display_pay_details1,payable:$scope.payable}
										
								}).success(function(data){						
														$scope.make_payment=data;
															console.log(data);
														
												setTimeout(function(){
														var innerContents = document.getElementById("printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);		   
											
											angular.element('#edit_package').modal('hide');
											
														   
														   
														
														}).error(function(data, status) {
														   alert("Not Done Try Again");
													   });  
					

                                                   
	  };
}]);
