(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);


$( document ).ready(function() {


   var customerRegisterForm = $('#customerRegisterForm');

   customerRegisterForm.on("submit", function(e) {
        e.preventDefault();

        var name = document.getElementById("nameInput").value;
        var email = document.getElementById("emailInput").value;
        var phoneNumber = document.getElementById("phonenumberInput").value;
        var address = document.getElementById("addressInput").value;
        var age = document.getElementById("ageInput").value;
        var gender = document.getElementById("genderInput").value;
        var password = document.getElementById("passwordInput").value;
          
        $.ajax({

               url : '../services/controller.php',
               type : 'POST',
               data : {
               "name" : name,
               "email" : email,
               "phoneNumber" : phoneNumber,
               "address" : address,
               "age" : age,
               "gender" : gender,
               "password" : password,
               "registerCustomer" : "registerCustomer"
          
              },
              
              success : function(data) {   
                
                console.log(data);
                    
              }
        }); 





   });






});