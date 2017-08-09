

$(document).ready(function(){

$("#edit_com").click(function()
{
 
 $(this).hide();
 $("#save_com").show();
 $("#show_hide").hide();
  $('#show_details').show();
 $("#edit_comdetails2").append( $('#show_details'));
  

});

$("#save_com").click(function()
{
 
 $(this).hide();
 $("#edit_com").show();
 $('#show_details').hide();
   $("#show_hide").show();

 $("#edit_comdetails2").append($('#show_hide'));

});





/* holiday calender jquery */


$("#calender").click( function(){

   
   $(this).addClass("hidden");
   $('#calenderview').removeClass("hidden");
   $('#tbl').addClass("hidden");
   $('#cal').removeClass("hidden");

});


$("#calenderview").click( function(){

   
   $(this).addClass("hidden");
   $('#calender').removeClass("hidden");
      $('#tbl').removeClass("hidden");
   $('#cal').addClass("hidden");


});


/* Employee */


$('#uploadfile').click(function(){


    $('#uploadbtn').click();

	
   });

    $('#uploadbtn').change(function(){
 	 
   
 	     var path = $('#uploadbtn').val() ;
         var val=$("#filename").text(path);

		 $("#resetfile").toggleClass("hidden"); 
		 
	   
	 });
   
	
   $('#resetfile').click(function(){
   
          $("#filename").text('') ;
		  $(this).toggleClass("hidden");
   
   });
   
   
   
   });


