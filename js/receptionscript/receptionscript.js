var app = angular.module('reception', []);

app.controller('reception_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_category={};
		 $scope.totalamt=0;
		$scope.add_category={};
		$scope.edit_category={};
        $scope.admit_show_category=false;
        $scope.admit_show_beds=false;
		$scope.shift_show_patient_category=false;
		$scope.shift_select_show=false;
		$scope.shift_show_category=false;
        $scope.shift_show_bed=false;
        $scope.show_dischagre_patient=false;   		
        $scope.admit_patient_show=true;   		
        $scope.shift_patient_show=false;   		
        $scope.discharge_patient_show=false; 
        $scope.enquiry=false; 
        $scope.advance_tab=false; 
        $scope.errormsg=false;
		$scope.errormsg4=false; 
	    $scope.show_print_discharge=false;
		$scope.enable_button=true;
		 $scope.shift_patient_admit={};	
		 $scope.devide=false;
		  $scope.draft=false;
		  $scope.balance=0;
		   $scope.ref_doc={};
	   $scope.referal={};
		 $scope.display_patient_details={};
		 $scope.display_pay_details={};
		 	$http.get("refdoc.php")
						.success(function(data){
							 
							$scope.display_ref_doc = data;
						   
						})
						.error(function() {
							$scope.data = "error in fetching data";
			});   
	   $scope.patient_admit={};
	
			 $scope.shift_patient = function() {
			           $scope.enquiry=false; 
						$scope.admit_patient_show=false;   		
                    $scope.shift_patient_show=true;   		
                   $scope.discharge_patient_show=false; 
			      $scope.advance_tab=false;
			 };
			 $scope.discharge_patient = function() {
			 $scope.enquiry=false; 
						$scope.admit_patient_show=false;   		
        $scope.shift_patient_show=false;   		
        $scope.discharge_patient_show=true; 
			$scope.advance_tab=false; 
			 }; 
			 
			 $scope.admit_patient = function() {
			 $scope.enquiry=false; 
						$scope.admit_patient_show=true;   		
        $scope.shift_patient_show=false;   		
        $scope.discharge_patient_show=false; 
			 $scope.advance_tab=false;
			 };
			 $scope.display_advance_given = function() {
			 $scope.enquiry=false; 
						$scope.admit_patient_show=false;   		
				$scope.shift_patient_show=false;   		
				$scope.discharge_patient_show=false; 
					 $scope.advance_tab=true;
					 
				
			 };
		  $scope.display_admited_patient = function() {
		         
					
							 $scope.enquiry=true; 
							$scope.admit_patient_show=false;   		
						$scope.shift_patient_show=false;   		
						$scope.discharge_patient_show=false; 
						$scope.advance=false;
						$http.get("enquiry.php")
								.success(function(data){
									 
									$scope.display_details_patient=data;
									 console.log(data);
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
			};	
		//on load funtions
		
		$http.get("display_roomtype.php")
                .success(function(data){
				      
                    $scope.display_room_type = data;
					 
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				
				
		$http.get("display_advance.php")
                .success(function(data){
				      
                    $scope.display_advance = data;
					 console.log(data);
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		// on click funtions
		
		// display room_type
        $scope.room_type = function() {
						 
							
						
						$http({     
						                method : 'POST' ,
										url: 'display_room_category.php',
										data: {roomid:$scope.roomid}
										
								}).success(function(data){
							            
										 $scope.admit_show_category=true;	
										$scope.display_room_category = data;
										angular.element('#add_category').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
	    };

		//select beds
         $scope.shows_beds = function(ward_id) {
                   
                                 				    
													$http.post("show_beds.php",{ward_id : ward_id})
														.success(function(data,status,headers,config){
														  
														   $scope.beds_shows = data;
														  
														    $scope.admit_show_beds=true;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //admit patient

		$scope.admit = function(bed_id,room_id,ward_id) {
		
		            
						
					  $http.post("admit_patient.php",{ward_id : ward_id,bed_id : bed_id,room_id : room_id})
					  .success(function(data){
									    
									
										$scope.patient_admit = data;
										
										angular.element('#edit_category').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });
					   $http.get("display_doctor.php")
                .success(function(data){
				     
                    $scope.display_doctor = data;
					 
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				 
				 $http.get("display_insurance.php")
								.success(function(data){
									 
									$scope.display_insurance = data;
									
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
	
        };
		
		//	payment mode
		
		  $scope.paymentmode=false;
		 $scope.paynow = function() {
		          
		  $scope.paymentmode=true;
		 
		 };
		 
		 $scope.add_to_acc=function(){
			  $scope.paymentmode=false;
		 }
		   
		// admit to bed
	      $scope.admit_to_bed = function() {
								 
						if($scope.patient_admit.ref_doctor_list==null)
				$scope.patient_admit.ref_doctor_list=0;
												
                              $http({     
						                method : 'POST' ,
										url: 'admit_to_bed.php',
										data: $scope.patient_admit
							  }).success(function(data,status,headers,config){
								      
									  alert("Patient Admited");
									 console.log(data);
									  angular.element('#admitpatient').modal('hide');
													
					                                    window.location.reload();
							}).error(function(data, status) {
								   alert("error");
													   });  
      };
	  
	  
	
		
		//shift patient
		$scope.patientdetails={};
		 $scope.$watch('a.b', function () {
       

			
			
			$http({     
						                method : 'POST' ,
										url: 'display_beds_allotment.php',
										data:{patient_id: $scope.a.b}
										
								}).success(function(data){
									   $scope.shift_show_patient_category=true;
									   $scope.patientdetails=data;
									
									   if($scope.patientdetails.patient_id == "404")
										{
										   
										   $scope.errormsg=true;
										   $scope.shift_show_patient_category=false;
										}
										else										
									   {
									       $scope.errormsg=false;
									       $scope.display_bed_allot=$scope.patientdetails;
										  // $scope.shift_patient_admit.patient_id= $scope.display_bed_allot.patient_id;
										 $scope.shift_patient_admit.patient_id=$scope.patientdetails.patient_id;
									 }
										
						       }).error(function(data, status) {
						                 alert("error");
					   });
        //do something
    });
	
	
	//
	
		$scope.display_beds = function(room_id) {
						
		             
					  $http.post("display_beds.php",{room_id : room_id})
						.success(function(data,status,headers,config){
							$scope.display_beds = data;
						})
						.error(function() {
							$scope.data = "error in fetching data";
						});  
				 
				 
	
        };
		
		
	   
	   
	  //  shift display room_type
        $scope.dis_room_type = function() {
						$http.get("display_roomtype.php")
                .success(function(data){
				     
                    $scope.shift_display_room_type = data;
					 
					$scope.shift_select_show=true;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	    };
		//shift patient
		
		
		
		$(function() {
      $("#patientid" ).autocomplete({
      source: 'patient-details.php',
	  select: function( event, ui ) {
	    // appendTo: $("#addservice");
            var patient_id = ui.item.value;
			$scope.service.patient_id=patient_id;
			
			$scope.display_name();
		 }	 
	  
    });
  });

  $scope.display_name= function () {
  
						$http({     
						                method : 'POST' ,
										url: 'display_patient_name.php',
										data:{patient_id: $scope.service.patient_id}
                        }).success(function(data){
				                $scope.shift_show_patient_category=true;
									   $scope.namofpatient=data;
									  
		
									
										      $scope.errormsg=false;
										      $scope.name_of_patient = data;
											 
								               document.getElementById('naming').value=$scope.name_of_patient.patient_name;
											  
						
                              //  $scope.name_of_patient = data;
								//document.getElementById('naming').value=$scope.name_of_patient.patient_name;
				             
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
  };		
  //advance
   $(function() {
      $("#patientida" ).autocomplete({
      source: 'patient-details.php',
	  select: function( event, ui ) {
	    // appendTo: $("#addservice");
            var patient_id = ui.item.value;
			$scope.advance.patient_id=patient_id;
			
			$scope.display_name_advance();
		 }	 
	  
    });
  });

  $scope.display_name_advance= function () {
  
						$http({     
						                method : 'POST' ,
										url: 'display_patient_name.php',
										data:{patient_id: $scope.advance.patient_id}
                        }).success(function(data){
				                $scope.shift_show_patient_category=true;
									   $scope.namofpatient=data;
									  
		
									
										      $scope.errormsg=false;
										      $scope.advance_name = data;
											 
								               document.getElementById('naming').value=$scope.advance_name.patient_name;
											
						
                             
				             
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
  };
  $scope.devide_advance=false;
    $scope.advance_payment=function(id){
		   
		   
		   
		      
			  if(id=="Cash" || id=="Card")
			  {
			        
			         
					 $scope.devide_advance=false;
					 
			  
			  }
			  else{
			  
			       $scope.devide_advance=true;
			       
			  
			  }
			    
			  $scope.show_print_discharge=true;
		    
			  
		   };
   $scope.advance_patient=function(){
	      
		              $http({     
						                method : 'POST' ,
										url: 'advance_update.php',
										data:$scope.advance
                        }).success(function(data){
				              
							   $scope.display_advance = data;
							   console.log(data);
							    angular.element('#advance').modal('hide'); 
						})
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	   
   };
 
//advance ends here
	//admit patient Watch
			$(function() {
						  $("#patientid1" ).autocomplete({
						  source: 'patient-details.php',
						  select: function( event, ui ) {
							// appendTo: $("#addservice");
								var patient_id = ui.item.value;
								$scope.patient_admit.patient_id=patient_id;
								
								$scope.pateint_details_name();
							 }	 
						  
						});
					  });

		 $scope.pateint_details_name= function () {
										
			
			$http({     
						                method : 'POST' ,
										url: 'patient_name.php',
										data:{patient_id: $scope.patient_admit.patient_id}
										
								}).success(function(data){
									  // $scope.shift_show_patient_category=true;
									  
									   $scope.nameofpatient=data;   
									   if($scope.nameofpatient.patient_name == "404")
									    {
										          $scope.errormsg4=false;
										       $scope.errormsg=true;
											   $scope.patient_admit.patient_name="";
										}
										else  if($scope.nameofpatient.patient_name == "405")
									    {
										        $scope.errormsg=false;
											   $scope.errormsg4=true;
											   $scope.patient_admit.patient_name="";
										}
										
										else{
										
										      $scope.errormsg=false;
											  $scope.errormsg4=false;
										      $scope.patient_admit.patient_name=$scope.nameofpatient.patient_name;
											   document.getElementById('name1').value=$scope.patient_admit.patient_name;
											  $scope.enable_button=false;
										}
									  
										
						       }).error(function(data, status) {
						                 alert("error");
					   });
        //do something
    };

	
	
	
	
		// display room category
        $scope.shift_room_type = function() {
						 
								
						
						$http({     
						                method : 'POST' ,
										url: 'display_room_category.php',
										data: {roomid:$scope.room_id}
										
								}).success(function(data){
							              
										$scope.shift_display_room_category = data;
										
							            $scope.shift_show_category=true;
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
	    };

		//select beds
         $scope.shift_shows_beds = function(ward_id) {
                   
                                 				    
													$http.post("show_beds.php",{ward_id : ward_id})
														.success(function(data,status,headers,config){
														 
														   $scope.shift_beds_shows = data;
														   
														   $scope.shift_show_bed=true;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //admit patient
	   
	   $scope.shift_patient_admit={};
		$scope.shift_admit = function(bed_id,room_id,ward_id) {
		
		              
					  $http.post("admit_patient.php",{ward_id : ward_id,bed_id : bed_id,room_id : room_id,})
					  .success(function(data){
									    
										$scope.shift_patient_admit = data;
										$scope.shift_patient_admit.patient_id=$scope.a.b;
							      
						       }).error(function(data, status) {
						                 alert("error");
					   });
					   $http.get("display_doctor.php")
                .success(function(data){
				    
                    $scope.shift_display_doctor = data;
				 
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				  
				 
	
        };
		
		//	payment mode
		
		  $scope.paymentmode=false;
		 $scope.paynow = function() {
		          
		  $scope.paymentmode=true;
		 
		 };
		 
		 $scope.add_to_acc=function(){
			  $scope.paymentmode=false;
		 }
		   
		// admit to bed
	      $scope.shift_admit_to_bed = function() {
								 
							
								
							 $http({     
						                method : 'POST' ,
										url: 'shift_patient.php',
										data: $scope.display_bed_allot
										}).success(function(data,status,headers,config){
								      
									  
									 
									 
							}).error(function(data, status) {
								   alert("error");
													   });  
		
							 $http({     
						                method : 'POST' ,
										url: 'shift_admit_to_bed.php',
										data: $scope.shift_patient_admit
							  }).success(function(data,status,headers,config){
								   
									  alert("Patient shifted");
									
									  angular.element('#shiftpatient').modal('hide');
									  window.location.reload();
							}).error(function(data, status) {
								   alert("error");
													   });  
      };
	// discharge patient
		// display patient_display
		
		$scope.dispatient={};
        $scope.patient_display = function() {
						 
						
						$http({     
						                method : 'POST' ,
										url: 'display_patient_details.php',
										data: {patient_id:$scope.dpatient_id}
										
								}).success(function(data){
							       
                                  $scope.dispatient=data; 
                                								  
                                  if($scope.dispatient.patient_id=="404")
                                   {
								        $scope.errormsg=true;
										$scope.show_dischagre_patient=false;
										
								   }								  
                                  else{
                                      $scope.errormsg=false;								  
									$scope.display_patient_details = $scope.dispatient;
									$scope.show_dischagre_patient=true;
                                   }
										
						       }).error(function(data, status) {
						                 alert("error");
					   });
	    };
	
		
		
   // add services
     $http.get("display_service.php")
                .success(function(data){
				    
                    $scope.display_service = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
   
   // display service_price
        $scope.service_price = function() {
					 
								
						
						$http({     
						                method : 'POST' ,
										url: 'display_service_price.php',
										data: {service_id:$scope.service.list_service}
										
								}).success(function(data){
							             
										$scope.display_service_price = data;
										 		            
						       }).error(function(data, status) {
						                 alert("error");
					   });
	    };
		
		//$scope.slno=0;
		// add temp service
		   $scope.disp_service=[];
		   $scope.add_temp_service = function() {
			    $scope.show_div = true;
				 $http({     
						                method : 'POST' ,
										url: 'service_name.php',
										data: {service_id:$scope.service.list_service}
										
								}).success(function(data){
							            
											$scope.ser_name = data;
										 	$scope.disp_service.push({patient_id:$scope.service.patient_id,service_id :$scope.service.list_service, price : $scope.display_service_price.price,service_name:$scope.ser_name.service_name});
									
												$scope.service.list_service="";
												$scope.display_service_price.price="";
												
												
						       }).error(function(data, status) {
						                 alert("error");
					   });
		        
				
						  
		};
		$scope.delete_temp_service = function(name) {
			    			
		        $scope.disp_service.splice(name,1);
				
						  
		};

   
	// add service_details
	    	$scope.services_add={};
        $scope.service_add_details = function() {
						$scope.services_add=$scope.disp_service;
                      	
						
						
								
						
						$http({     
						                method : 'POST' ,
										url: 'service_adding.php',
										data: $scope.services_add
										
								}).success(function(data){
							             
										 angular.element('#addpatientservice').modal('hide');
										 		$scope.show_div=false;   
												$scope.disp_service=[];
													$scope.service="";
												}).error(function(data, status) {
						                 alert("error");
					   });
	
		};
		
		
		  //report of service
		 // display service_details
        $scope.show_service_details = function() {
						 
								
						
						$http({     
						                method : 'POST' ,
										url: 'service_details_show.php',
										data: {patient_id:$scope.patient_id}
										
								}).success(function(data){
							              
										$scope.display_service_show = data;
										 				            
						       }).error(function(data, status) {
						                 alert("error");
					   });
	    };
		 // display service_details
		 
        $scope.discharge = function() {
			                 $scope.draft=true;
                               $http({     
						                method : 'POST' ,
										url: 'advance.php',
										data: $scope.display_patient_details
										
								}).success(function(data){
							             $scope.advance = data;
										
												}).error(function(data, status) {
						                 alert("error");
					   });
								$http({     
						                method : 'POST' ,
										url: 'dischagre_patient.php',
										data: $scope.display_patient_details
							  }).success(function(data,status,headers,config){
							    
								     var total=0; 
										
									 $scope.discharge_patient = data;
									console.log(data);
									 	for(var i in data){
											
										   total = total + parseInt(data[i][4],10);  
										}
                                        $scope.totalamt=total-$scope.advance.advance;
										$scope.display_pay_details.devidetotalamt=$scope.totalamt;
									
									
		
									 									  
									
							}).error(function(data, status) {
								   alert("error");
							});
						
						
	    };
		$scope.final_patient_details={};
		$scope.personal_details={};
		
		   $scope.click_payment=function(id){
		   
		   
		   
		      
			  if(id=="Cash" || id=="Card")
			  {
			        
			         
					 $scope.devide=false;
					 
			  
			  }
			  else{
			  
			       $scope.devide=true;
			       
			  
			  }
			    
			  $scope.show_print_discharge=true;
		    
			  
		   };
           $scope.insurance={};
		   $scope.insurance.service_tax=0;
		   $scope.insurance.discount=0;
		   $scope.insurance.amount_member=0;
		   //insurance 
		   $scope.insurance=function(){
			   $http.get("display_insurance.php")
								.success(function(data){
									 
									$scope.display_insurance = data;
									
								})
								.error(function() {
									$scope.data = "error in fetching data";
								});
			   $http({     
						                method : 'POST' ,
										url: 'getpatient_details.php',
										data: $scope.display_patient_details
										
								}).success(function(data){
			                          	$scope.personal_details=data;
							          console.log(data);
						 
								}).error(function(data, status) {
								alert("error");
								
								});
			   
			   $http({     
						                method : 'POST' ,
										url: 'advance.php',
										data: $scope.display_patient_details
										
								}).success(function(data){
							             $scope.advance = data;
										console.log(data);
												}).error(function(data, status) {
						                 alert("error");
					   });
			   
			   $http({     
						                method : 'POST' ,
										url: 'dischagre_patient.php',
										data: $scope.display_patient_details
							  }).success(function(data,status,headers,config){
							       console.log(data);
								     var total=0; 
										
									 $scope.discharge_patient = data;
									console.log(data);
									 	for(var i in data){
											
										   total = total + parseInt(data[i][4],10);  
										}
                                        $scope.totalamt=total-$scope.advance.advance;
										$scope.display_pay_details.devidetotalamt=$scope.totalamt;
									
									    angular.element('#insurance').modal('show');
		
									 									  
									
							}).error(function(data, status) {
								   alert("error");
							});
			    
			   
		   };
		   
		   
		   //final print
		  $scope.finalprint = function() {
			  
			          
						
						$http({     
						                method : 'POST' ,
										url: 'getpatient_details.php',
										data: $scope.display_patient_details
										
								}).success(function(data){
			                          	$scope.personal_details=data;
							
						 
								}).error(function(data, status) {
								alert("error");
								
								});
							$http({     
						                method : 'POST' ,
										url: 'rupees_to_word.php',
										data:{totlamt:$scope.display_pay_details.devidetotalamt,insurance_discount:$scope.insurance_bill.discount,insurance_service_tax:$scope.insurance_bill.service_tax} 
										
								}).success(function(data){
			                          	$scope.amount_in_words=data.amount_in_words;
							            console.log(data);
						 
								}).error(function(data, status) {
								alert("error");
								
								});
						
						
						$http({     
						                method : 'POST' ,
										url: 'discharge_patient_final.php',
										data: {display_patient_details:$scope.display_patient_details, display_pay_details:$scope.display_pay_details,balance:$scope.balance,insurance:$scope.insurance_bill}
										
								}).success(function(data){
							             var total=0; 
										
										$scope.final_patient_details = data;
								         console.log(data);
									 	for(var i in data){
											
										   total += parseInt(data[i][4],10);
										   
										}
										
                                        $scope.totalamt=total;
                                        $scope.totalsum=$scope.totalamt-$scope.advance.advance;
							$http({     
						                method : 'POST' ,
										url: 'bill_no.php',
										data: $scope.display_patient_details
										
								}).success(function(data){
			                          $scope.billdetails=data;
											setTimeout(function(){
													var innerContents = document.getElementById("printdischarge").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											setTimeout(function(){
											   //window.location.reload();
											  },600);
								}).error(function(data, status) {
								alert("error");
								
								});
										
									
													            
						       }).error(function(data, status) {
						                 alert("error");
					   });
					   					   
	    };
		
		
	
     
}]);




