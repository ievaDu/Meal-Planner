
$("form").submit(function(e){

    var error = "";


    if ($("#title").val() == ""){
        error+= "Please don't leave the title field empty<br><br>";
    }

    if ($("#breakfast").prop("checked")) {
        return true;
    } else if ($("#lunch").prop("checked")) {
        return true;
    } else if ($("#dinner").prop("checked")) {
        return true;

    } else {
        error+= "Please check if the recipe is for breakfast, lunch or dinner<br><br>";
    }

    if (error!= "") {
        $("#error").html('<div class="alert alert-dark" role="alert">'+ error + '</div>');
        return false;

    } else {
        return true;

    }});






