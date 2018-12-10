var app = angular.module('home', ['ngRoute', 'ngValidate']);


app.controller('ctrl', function($scope, $http, $location){
   
   // signin code
    $scope.signinValidate = {
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
        }
        
    };

    $scope.signin = function (form) {
        if(form.validate()) {
            // Form is valid!
            
            $http({
                url: 'http://localhost/MiConnect/actions/user/signinAction.php',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: 'userName='+ $('#signinNAME').val() +'&password='+ $('#signinPWD').val()
            }).then(function(response) {
                $('#signinRES').html(response.data.message);
                if(response.data.message == 'User Not Found'){
                    $('#signinMessageBox').removeClass("success-validation");
                    $('#signinMessageBox').addClass("error-validation");
                }
                if(response.data.message == 'Signed In'){
                    $('#signinMessageBox').removeClass("error-validation");
                    $('#signinMessageBox').addClass("success-validation");
                    $location.path('/feed');
                }
            })

        }
    };

    // sign up code
    $scope.registerValidate = {
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
            fullName: {
                required: true,
                minlength: 5,
                maxlength: 40,
                digits: false
            },
            email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
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
        // Specify validation error messages
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
            
        }
    };

    $scope.register = function(form){
        if(form.validate()){
            $.ajax({
                type: "POST",
                url: "/MiConnect/actions/user/signupAction.php",
                data: {
                    userName : $('#userName').val(),
                    fullName : $('#fullName').val(),
                    email : $('#email').val(),
                    contact : $('#contact').val(),
                    password : $('#password').val(),
                    gender : $('#signupForm input[name=gender]').val(),
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

            $http({
                url: 'http://localhost/MiConnect/actions/user/signupAction.php',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: 'userName='+ $('#userName').val() +
                      '&fullName='+ $('#fullName').val() +
                      '&email='+ $('#email').val() +
                      '&contact='+ $('#contact').val() +
                      '&password='+ $('#password').val() +
                      '&gender='+ $('#signupForm input[name=gender]').val() +
                      '&date='+ $('#date').val() +
                      '&month='+ $('#month').val() +
                      '&year='+ $('#year').val() +
                      '&submit='+ $('#submit').val()
            }).then(function(response) {
                $('#signupRES').html(response.data.message);
                if(response.data.message == 'You Have Successfully Signed Up'){
                    $('#signupMessageBox').removeClass("error-validation");
                    $('#signupMessageBox').addClass("success-validation");
                    $location.path('/');
                }
                if(response.data.message == 'Email already exist.' || response.data.message == ' User Name already exist.' || response.data.message == 'Email User Name already exist.'){
                    $('#signupMessageBox').removeClass("success-validation");
                    $('#signupMessageBox').addClass("error-validation");
                }
            })
        }
    };

});
