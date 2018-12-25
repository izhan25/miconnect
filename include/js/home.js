// Global Routes
const root = 'http://localhost/MiConnect/';

// on load
$(function(){
    $('#view').load( root + 'views/components/_newsFeed.php');
});


// Event Listeners for Views
$('.feedBtn').click(function(){
    $('#view').load( root + 'views/components/_newsFeed.php');

    // managing selected css class
    $('.option-feed').addClass('selected');
    $('.option-friends').removeClass('selected');
    $('.option-request').removeClass('selected');
    $('.option-profile').removeClass('selected');
    $('.option-album').removeClass('selected');
});

$('.friendsBtn').click(function(){
    $('#view').load( root + 'views/components/_findFriends.php');

    // managing selected css class
    $('.option-feed').removeClass('selected');
    $('.option-friends').addClass('selected');
    $('.option-request').removeClass('selected');
    $('.option-profile').removeClass('selected');
    $('.option-album').removeClass('selected');
});

$('.RequestBtn').click(function(){
    $('#view').load( root + 'views/components/_requests.php');

    // managing selected css class
    $('.option-feed').removeClass('selected');
    $('.option-friends').removeClass('selected');
    $('.option-request').addClass('selected');
    $('.option-profile').removeClass('selected');
    $('.option-album').removeClass('selected');
});

$('.ProflileBtn').click(function(){
    $('#view').load( root + 'views/components/_profile.php');

    // managing selected css class
    $('.option-feed').removeClass('selected');
    $('.option-friends').removeClass('selected');
    $('.option-request').removeClass('selected');
    $('.option-profile').addClass('selected');
    $('.option-album').removeClass('selected');
});

$('.AlbumBtn').click(function(){
    $('#view').load( root + 'views/components/_album.php');

   // managing selected css class
   $('.option-feed').removeClass('selected');
   $('.option-friends').removeClass('selected');
   $('.option-request').removeClass('selected');
   $('.option-profile').removeClass('selected');
   $('.option-album').addClass('selected');
});


// Sending Request Function
function sendRequest(name){
    $.ajax({
        type: "GET",
        url:  root + "actions/user/sendRequestAction.php",
        data: {
            user_id : name
        },
        dataType:'JSON', 
        success: function(response){
            var btn = $('#'+response.requested);
            btn.html(response.message);
            btn.removeClass('btn-primary');
            btn.addClass('btn-default');
        },
        error: function(e){
            console.log(e.responseText);
        }
    });
}

// Back to home [ will be clicked from profiles page ]
function backToHome(){
    window.location = root;
}

// Displaying Profile [will be clicked from news feed page]
function displayProfile(name){
    window.location = root + 'views/profiles.php?user=' + name;
}


// Accept Request
function acceptRequest(id){
    $.ajax({
        type: "GET",
        url:  root + "actions/user/acceptRequestAction.php",
        data: {
            user_id : id
        },
        dataType:'JSON', 
        success: function(response){
            var btn = $('#'+response.requested);
            btn.html(response.message);
            btn.removeClass('btn-primary');
            btn.addClass('btn-default');
        },
        error: function(e){
            console.log(e.responseText);
        }
    });
}

// Log out 
function logout(){
    $.confirm({
        title: 'Confirm!',
        content: 'Are You Sure You Want To Log Out',
        buttons: {
            confirm: function () {
                window.location = root + 'actions/user/logout.php';
            },
            cancel: function () {
                // do nothing
            }
        }
    });
    
}

// Managing Gender Input
function getGender(gender){
    $('#genderInput').val(gender);
}

// signup validation
$("form[name='registration']").validate({
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
        fullName: {
            required: true,
            minlength: 5,
            maxlength: 40,
            digits: false
        },
        email: {
            required: true,
            email: true
        },
        contact: {
            required: true,
            minlength: 11,
            maxlength: 11,
            digits: true
        },
        password: {
            required: true,
            minlength: 5
        },
        repassword:{
            equalTo: "#password"
        },
        gender: "required",
        date: "required",
        month: "required",
        year: "required"
    },
    
    messages: {
        userName: {
            required: "Please provde a user name",
            minlength: "user name must conatin more than 3 chars",
            maxlength: "user name must conatin less than 20 chars",
            digits: "digits are not allowed here"
        },
        fullName: {
            required: "Please provde a full name",
            minlength: "full name must conatin more than 20 chars",
            maxlength: "full name must conatin less than 40 chars",
            digits: "digits are not allowed here"
        },
        email: "Please enter a valid email address",
        contact:{
            required: "Please provde a contact number",
            minlength: "invalid phone number",
            maxlength: "invalid phone number",
            digits: "contact must contain digits"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        repassword: {
            equalTo: "Password doesn't match"
        },
        gender: "required",
        date: "!",
        month: "!",
        year: "!"
        
    },
    submitHandler: function(form) {

        $.ajax({
            type: "POST",
            url:  root + "actions/user/signupAction.php",
            data: {
                userName : $('#userName').val(),
                fullName : $('#fullName').val(),
                email : $('#email').val(),
                contact : $('#contact').val(),
                password : $('#password').val(),
                gender : $('#genderInput').val(),
                date : $('#date').val(),
                month : $('#month').val(),
                year : $('#year').val(),
                submit : 'submit'
            },
            dataType:'JSON', 
            success: function(response){
                $('#signupRES').html(response.message);
                if(response.message == 'You Have Successfully Signed Up'){
                    $('#signupMessageBox').removeClass("error-validation");
                    $('#signupMessageBox').addClass("success-validation");
                }
                if(response.message == 'Email already exist.' || response.message == ' User Name already exist.' || response.message == 'Email User Name already exist.'){
                    $('#signupMessageBox').removeClass("success-validation");
                    $('#signupMessageBox').addClass("error-validation");
                }
            },
            error: function(e){
                $('#signupRES').html(e.responseText);
            }
        });
        
        //form.submit();
    }
});


// signin validation
$("form[name='login']").validate({
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
    submitHandler: function(form) {
        
        $.ajax({
            type: "POST",
            url:  root + "actions/user/signinAction.php",
            data: {
                userName : $('#signinNAME').val(),
                password : $('#signinPWD').val()
            },
            dataType:'JSON', 
            success: function(response){
                $('#signinRES').html(response.message);
                if(response.message == 'User Not Found'){
                    $('#signinMessageBox').removeClass("success-validation");
                    $('#signinMessageBox').addClass("error-validation");
                }
                if(response.message == 'Signed In'){
                    $('#signinMessageBox').removeClass("error-validation");
                    $('#signinMessageBox').addClass("success-validation");
                    window.location = response.url;
                }
            },
            error: function(e){
                $('#signinRES').html(e.responseText);
            }
        });
        
        //form.submit();
    }
});

