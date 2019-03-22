$( document ).ready(function() {


$('.viewButon').on('click', function(e){


    


});


$('.bookButton').on('click', function(e){

	// var bookTime = $("#4time").val();
	var result = $(this).val().split("|");
	var email = result[0];
	var id = result[1];
	var appointmentTime = $("#" + id + "time" ).val();
	var appointmentDate = $("#" + id + "date" ).val();
	var status = 1;

	$.ajax({

              url : './services/controller.php',
              type : 'POST',
              data : {
               "serviceId" : id,
               "appointmentTime" : appointmentTime,
               "appointmentDate" : appointmentDate,
               "status" : status,
               "bookAppointment" : "bookAppointment"
              },
              
              success : function(data) {   
                console.log(data);
                
                if(data == "success") {
                  
                  alert("appointment booked!");
                  window.location.href = "http://qav2.cs.odu.edu/abel/DomHack/Home.html";
                  
                  
                } 
               
                
                 
              }
        }); 

	//alert("appointmentTime: " + appointmentTime + " appointmentDate: " + appointmentDate);


});


});