var app = angular.module('doctor', []);

app.controller('doctor_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
      
        
        $scope.display_doctor=[];
		$scope.add_doct={};
		$scope.edit_doct={};		
	$scope.mor_start_time=$scope.mor_end_time=$scope.mor_interval=$scope.aft_start_time=$scope.aft_end_time=$scope.aft_interval=$scope.eve_start_time=$scope.eve_end_time=$scope.eve_interval=$scope.nig_start_time=$scope.nig_end_time=$scope.nig_interval=$scope.mor_session=$scope.aft_session=$scope.eve_session=$scope.nig_session="";
		$scope.filter={};
		//on load funtions
		
		
		
		
		$http.get("display_doctor.php")
                .success(function(data){
				 
                    $scope.display_doctor = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		
		// add doctors
        $scope.add_doctor = function() {
		               
						$http({     
						                method : 'POST' ,
										url: 'add_doctor.php',
										data: $scope.add_doct
										
								}).success(function(data){
							            console.log(data);
										$scope.display_doctor = data;
										angular.element('#adddoctor').modal('hide');
							            $scope.add_doct="";
										 
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific doctor
         $scope.edit_doctor = function(doctor_id) {
                   
													$http.post("edit_doctor.php",{doctor__id : doctor_id})
														.success(function(data,status,headers,config){
														
														   $scope.edit_doct = data;
														   
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update doctor
	   
	   
		$scope.update_doctor = function() {
		
		             
					  $http({     
						                method : 'POST' ,
										url: 'update_doctor.php',
										data:$scope.edit_doct
										
								}).success(function(data){
						
										$scope.display_doctor = data;
										angular.element('#editdoctor').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.delete_doctor = function(doctor_id) {
				
								$scope.doctor_id=doctor_id;
                                $http.post("delete_doctor.php",{doctor_id : $scope.doctor_id})
														.success(function(data,status,headers,config){
														      $scope.display_doctor = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };

	  
	 	  var input = $('#start_time');
           input.clockpicker({
          autoclose: true
           });
		   var input = $('#end_time');
           input.clockpicker({
          autoclose: true
           });
        
		$scope.model=[];
			$scope.attribname='';
		
			
$scope.callclock=function(){
		   
				$('.clockpicker').clockpicker({
    placement: 'top',autoclose: true
   }).find('input').change(function(){
					 
		             var model = $(this).attr("ng-model");
					 $scope.attribname=model;
					  var input=$(this);
					 
					  input.trigger('input');
					  if($scope.attribname=="option.mor_start_time")
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
          

		
	   $scope.check_time=function(session){
		            
                    $scope.start_time=angular.element("#start_time").val();
					$scope.end_time=angular.element("#end_time").val();
		             if(session=="1")
					{
						$scope.mor_start_time=$scope.start_time;
						$scope.mor_end_time=$scope.end_time;
						$scope.mor_interval=$scope.interval;
						if($scope.start_time=="")
						$scope.mor_session="";
                        else
						$scope.mor_session=session;
					}
					if(session=="2")
					{
						$scope.aft_start_time=$scope.start_time;
						$scope.aft_end_time=$scope.end_time;
						$scope.aft_interval=$scope.interval;
						if($scope.aft_start_time=="")
						$scope.start_time="";
                        else
						$scope.aft_session=session;
					}
					if(session=="3")
					{
						$scope.eve_start_time=$scope.start_time;
						$scope.eve_end_time=$scope.end_time;
						$scope.eve_interval=$scope.interval;
						if($scope.start_time=="")
						$scope.eve_session="";
                        else
						$scope.eve_session=session;
						
					}
					if(session=="4")
					{
						$scope.nig_start_time=$scope.start_time;
						$scope.nig_end_time=$scope.end_time;
						$scope.nig_interval=$scope.interval;
						if($scope.start_time=="")
						$scope.nig_session="";
                        else
						$scope.nig_session=session;
					}
        		   $scope.start_time=$scope.end_time=$scope.interval=session="";
				  
	   };
	   
	   $scope.get_doctor_details=function(doctor_id){
             
		     $http({     
						                method : 'POST' ,
										url: 'details_doctor.php',
										data:{doctor_id:doctor_id}
										
								}).success(function(data){
						                $scope.detail_doc=data;
										$scope.session=data.session
										
							
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
		$http.get("display_days.php")
                .success(function(data){
				 
                    $scope.doc_days = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		   
		   
	   };
	  
          $scope.time=[];
		 $scope.sessionvalues={};
     $scope.display_timeings=function(day){
		   $scope.day_details=day;
		$scope.sessionvalues={day_id:$scope.day_details.day_id,day:$scope.day_details.day,mor_session:$scope.mor_session,mor_start_time:$scope.mor_start_time,mor_end_time:$scope.mor_end_time,mor_interval:$scope.mor_interval,aft_session:$scope.aft_session,aft_start_time:$scope.aft_start_time,aft_end_time:$scope.aft_end_time,aft_interval:$scope.aft_interval,eve_session:$scope.eve_session,eve_start_time:$scope.eve_start_time,eve_end_time:$scope.eve_end_time,eve_interval:$scope.eve_interval,nig_session:$scope.nig_session,nig_start_time:$scope.nig_start_time,nig_end_time:$scope.nig_end_time,nig_interval:$scope.nig_interval};
		 $scope.time.push($scope.sessionvalues);
		 $scope.sessionvalues={};
          $scope.mor_start_time=$scope.mor_end_time=$scope.mor_interval=$scope.aft_start_time=$scope.aft_end_time=$scope.aft_interval=$scope.eve_start_time=$scope.eve_end_time=$scope.eve_interval=$scope.nig_start_time=$scope.nig_end_time=$scope.nig_interval=$scope.mor_session=$scope.aft_session=$scope.eve_session=$scope.nig_session="";		 
		 $scope.show_timings_list=true;
	  };
	  $scope.delete_temp_timing = function(day_id) {
			    
		        $scope.time.splice(day_id,1);
						  
		};
		
	 
 	 $scope.save_timings=function(options,index){
		 
		  
		   $scope.time.splice(index,1,options);
		  
		 
	 };	
		$scope.save_timimgs=function(){
            console.log($scope.time);
		     $http({     
						                method : 'POST' ,
										url: 'save_doctor_timing.php',
										data:{times:$scope.time,doctor_id:$scope.detail_doc.doctor_id}
										
								}).success(function(data){
						               angular.element('#settiming').modal('hide');
										console.log(data);
										$scope.time=[];
										$scope.show_timings_list=false;
							
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
		};
	  
}]);
