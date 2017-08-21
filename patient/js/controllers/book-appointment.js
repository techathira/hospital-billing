
var app = angular.module('book-appointment',  []);

app.controller('bookapt_controller', ['$scope', '$http', function ($scope, $http) {
        
     
		
    $scope.display_doctor = [];
	$scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 5;
    $scope.searchText = '';
    getData();

    function getData() {
     $http.get('includes/display-doctors.php?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText)
        .success(function(data) {
        	
            $scope.display_doctor = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.doctors, function(temp){
                $scope.display_doctor.push(temp);
            });
        });
    }

    
    $scope.$watch('currentPage + pageSize', function() {
    		getData();
    });
    $scope.pageSizeChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }

    //Open Modal and Load today's available slots


    $scope.apt_date=null;
    $scope.avalable_slots={};
    $scope.avalable_on=$scope.bookking_doc_id='';
    $scope.danger=false;
    $scope.load_slots= function(doctor_id){

			  $http.post("includes/get-doctor-apointment-slots.php",{doctor_id : doctor_id, apt_date: $scope.apt_date})
					.success(function(data,status,headers,config){
                            console.log(data); 
							$scope.avalable_slots=data['available_slots'];
							if(data['available_slots'].length==0){
								$scope.danger=true;
							}else{$scope.danger=false;}
							$scope.apt_date=data['date'];
							$scope.bookking_doc_id = data['doctor_id'];
							angular.element('#slots-modal').modal('show');

														   
					}).error(function(data, status) {
						alert("error");
					});  
    	
    } 

    $scope.selected_slot={};
    $scope.IsClickEnable=false

    $scope.select_slot=function(mor_slot){
 
             $scope.selected_slot=mor_slot;
             if($scope.selected_slot != undefined){$scope.IsClickEnable=true;}
             

    }


    /* Book Apointment on selected slot */
    $scope.appointment_reason='';
    $scope.book_my_slot= function(){

         $http.post("includes/book-my-slot.php",{selected_slot : $scope.selected_slot, apt_date:$scope.apt_date,reason:$scope.appointment_reason})
					.success(function(data,status,headers,config){
						console.log(data);
                             
							if(data.status=="success"){

                                $scope.selected_slot={};
                                angular.element('#slots-modal').modal('hide');

                                $.notify({icon: 'ti-check',message: "Your Slot is booked, Check you registerd phone for more details"
									},{
                						type: 'success',
                						timer: 600
            				});

							}else{

                                 $.notify({icon: 'ti-check',message: "Not Done, Please try again"
									},{
                						type: 'success',
                						timer: 600
            				});

							}
														   
					}).error(function(data, status) {
						alert("error");
					});  
    }
     /* Book Apointment End here */
	
     
}]);
