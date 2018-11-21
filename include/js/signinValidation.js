// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='login']").validate({
    // Specify validation rules
    rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        userName: {
            required: true,
            minlength: 3,
            maxlength: 20,
            digits: false
        },
        password: {
            required: true,
            minlength: 5
        },
        
    },
    // Specify validation error messages
    messages: {
        userName: {
            required: "Please provde a user name",
            minlength: "user name must conatin more than 3 chars",
            maxlength: "user name must conatin less than 20 chars",
            digits: "digits are not allowed here"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        
        $.ajax({
            type: "POST",
            url: "/MiConnect/actions/user/signinAction.php",
            data: {
                userName : $('#signinNAME').val(),
                password : $('#signinPWD').val()
            },
            dataType:'JSON', 
            success: function(response){
                $('#signinRES').html(response.message);
                // put on console what server sent back...
            },
            error: function(e){
                $('#signinRES').html(response.message);
            }
        });
        
        //form.submit();
    }
    });

    
});