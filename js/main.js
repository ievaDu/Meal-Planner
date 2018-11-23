
    function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }

    $("form").submit(function(e){

    var error = "";


    if ($("#name").val() == ""){
            error+= "Please don't leave the name field empty<br><br>";
        }
    if ($("#email").val() == ""){
        error+= "Please don't leave the email field empty<br><br>";
    }
    if (isEmail($("#email").val()) == false) {
        error+= "The email enetered is invalid<br><br>";

    }


    if ($("#password").val() == ""){
        error+= "Please don't leave the password field empty<br>";
    } else if ($("#password").val().length < 4 || $("#password").val().length > 12){
        error+= "The password should be between 4 and 12 characters long<br>";
            }

    if($("#password").val() !== $("#passwordConfirm").val()){
        error+= "The passwords don't match<br>";
    }

    if (error!= "") {
        $("#error").html('<div class="alert alert-dark" role="alert">'+ error + '</div>');
        return false;

    } else {
        return true;

    }});






