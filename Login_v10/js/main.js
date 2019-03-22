
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

$('.customerButton').on('click', function(e){

    window.location.href = "http://qav2.cs.odu.edu/abel/DomHack/colorlib-regform-1/customerRegister.html";

});

$('.beautyButton').on('click', function(e){

    window.location.href = "http://qav2.cs.odu.edu/abel/DomHack/services.php";

});

$('.loginButton').on('click', function(e){

    var email = document.getElementById('usernameInput').value;
    var password = document.getElementById('passwordInput').value;

      e.preventDefault();
      $.ajax({

              url : '../services/controller.php',
              type : 'POST',
              data : {
               "email" : email,
               "password" : password,
               "loginRequest" : "loginRequest"
              },
              
              success : function(data) {   
                console.log(data);
                    
                    if(data == "true") {
                    window.location.href = "http://qav2.cs.odu.edu/abel/DomHack/Home.html";
                    } else {
                        alert("Wrong password, Please try again.");
                    }

                 
              }
        }); 


});


$('.providerButton').on('click', function(e){

    window.location.href = "http://qav2.cs.odu.edu/abel/DomHack/colorlib-regform-1/providerRegistration.html";


});


    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);