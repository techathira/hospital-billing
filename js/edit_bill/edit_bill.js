var app = angular.module('bill', []);

app.controller('bill_controller', ['$scope', '$http', function ($scope, $http) {
     $scope.bill_no={};
     $scope.op_bill_no={};
     $scope.test_bill_no={};
     $scope.package_bill_no={};
	  $scope.bill_details={};
	  $scope.op_bill_details={};
	  $scope.test_bill_details={};
	  $scope.package_bill_details={};
	  $scope.bill={};
	  $scope.payment_mode={};
		$scope.display_pay_details={};
	   $scope.devide=false;
	   $scope.show_op_div=false;
		$scope.show_ip_div=false;
		$scope.show_package_div=false;
		$scope.show_test_div=false;
		//ip variable
		$scope.discount=0;
		$scope.bill_no={};
		
		$scope.balance=0;
		
		//op variables
		$scope.op_discount=0;
		$scope.op_bill_no={};
		
		$scope.op_balance=0;
		
		// test variables
		$scope.test_discount=0;
		$scope.test_bill_no={};
		
		$scope.test_balance=0;
		// package variables
		$scope.package_discount=0;
		$scope.package_bill_no={};
		
		$scope.package_balance=0;
		
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
								$scope.show_package_div=true;
								$scope.show_test_div=false;
		};
	   //ip details
       $scope.click_payment=function(id){
		  if(id=="Cash" || id=="Card")
			  {
					 $scope.devide=false;
			  
			  }
			  else{
			  
			       $scope.devide=true;
			  }
		   };
     $scope.get_bill_details=function(){
	 
	   
	             
						$http.post("show_details.php",{bill_no: $scope.bill_no})
														.success(function(data,status,headers,config){
														
														 
														   $scope.bill_details = data;
													
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  
	 
	 };


$scope.call=function(sl_no,quantity,amount,bill_no){
	
	              if(quantity=="" || quantity==0)
				  {
					  
				  }		
            else{				  
	                              
								$http.post("update_bill.php",{sl_no: sl_no,quantity:quantity,amount:amount,bill_no:bill_no})
											.success(function(data,status,headers,config){
														
														   $scope.bill_details = data;
														  
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  


	}
};
// ip ends here

// op details
   $scope.get_op_bill_details=function(){
	 
	   
	             
						$http.post("show_op_details.php",{bill_no: $scope.op_bill_no})
														.success(function(data,status,headers,config){
														
														 
														   $scope.op_bill_details = data;
													       console.log(data);
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  
	 
	 };
	 $scope.op_call=function(sl_no,quantity,amount,bill_no){
	
	              if(quantity=="" || quantity==0)
				  {
					  
				  }		
            else{				  
	                              
								$http.post("update_op_bill.php",{sl_no: sl_no,quantity:quantity,amount:amount,bill_no:bill_no})
											.success(function(data,status,headers,config){
														
														   $scope.op_bill_details = data;
														  
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  


	}
};



//op ends here
// test details
   $scope.get_test_bill_details=function(){
	 
	   
	             
						$http.post("show_test_details.php",{bill_no: $scope.test_bill_no})
														.success(function(data,status,headers,config){
														
														 
														   $scope.test_bill_details = data;
													       console.log(data);
                                                          
														}).error(function(data, status) {
														   alert("error");
													   });  
	 
	 };
	



//test ends here
// package details
   $scope.get_package_bill_details=function(){
	 
	   
	             
						$http.post("show_package_details.php",{bill_no: $scope.package_bill_no})
														.success(function(data,status,headers,config){
														   $scope.package_bill_details = data;
													       console.log(data);
														}).error(function(data, status) {
														   alert("error");
													   });  
	 
	 };
	 



//package ends here

//ip print

$scope.print_section=function(){
	
											$http({     
						                method : 'POST' ,
										url: 'bill_no.php',
										data: {bill_no:$scope.bill_no,discount : $scope.discount,total:$scope.bill_details.total.total,payment_mode:$scope.payment_mode,display_pay_details:$scope.display_pay_details,balance:$scope.balance}
										
								}).success(function(data){
			                          $scope.billdetails=data;
									  console.log(data);
									
											setTimeout(function(){
													var innerContents = document.getElementById("printdischarge").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
								}).error(function(data, status) {
								alert("error");
								
								});
	
	
	
};
//ip print ends here
//op print 
   $scope.op_print_section=function(){
	
											$http({     
						                method : 'POST' ,
										url: 'op_bill_no.php',
										data: {bill_no:$scope.op_bill_no,discount : $scope.op_discount,total:$scope.op_bill_details.total.total,payment_mode:$scope.payment_mode,display_pay_details:$scope.display_pay_details,balance:$scope.op_balance}
										
								}).success(function(data){
			                          $scope.op_billdetails=data;
									  console.log(data);
									
											setTimeout(function(){
													var innerContents = document.getElementById("print_op").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
								}).error(function(data, status) {
								alert("error");
								
								});
	
	
	
};
//op print ends here	

//test print
$scope.test_billdetails={};
$scope.test_print_section=function(){
	
											$http({     
						                method : 'POST' ,
										url: 'test_bill_no.php',
										data: {bill_no:$scope.test_bill_no,discount : $scope.test_discount,total:$scope.test_bill_details.total.total,payment_mode:$scope.payment_mode,display_pay_details:$scope.display_pay_details,balance:$scope.test_balance}
										
								}).success(function(data){
			                          $scope.test_billdetails=data;
									  console.log($scope.test_billdetails);
									
											setTimeout(function(){
													var innerContents = document.getElementById("print_test").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
								}).error(function(data, status) {
								alert("error");
								
								});
	
	
	
};
//test print ends here
//package print

$scope.package_print_section=function(){
	                               	$http({     
						                method : 'POST' ,
										url: 'package_bill_no.php',
										data: {bill_no:$scope.package_bill_no,discount : $scope.package_discount,total:$scope.package_bill_details.totalamt,payment_mode:$scope.payment_mode,display_pay_details:$scope.display_pay_details,balance:$scope.package_balance}
										
								}).success(function(data){
			                          
											
									
											setTimeout(function(){
													var innerContents = document.getElementById("print_package").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											}).error(function(data, status) {
								alert("error");
								
								});
								
};
//package print ends here

}]);

