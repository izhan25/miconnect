// Wait for the DOM to be ready
$(function() {
// Initialize form validation on the registration form.
// It has the name attribute "registration"
$("form[name='registration']").validate({
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
    
},
// Make sure the form is submitted to the destination defined
// in the "action" attribute of the form when valid
submitHandler: function(form) {
    form.submit();
}
});
});