$(function() {

    $('.user-image').click(function(){
        $('#updateImage').modal('show');
    });

    // Code for birthdate
    $('#birthdateDisplay').show();
    $('#birthdateUpdate').hide();

    $('#editBirthDate').click(function(e){
        e.preventDefault();
        $('#birthdateDisplay').hide();
        $('#birthdateUpdate').show();
    });
    
    $('#discardBirthDate').click(function(e){
        e.preventDefault();
        $('#birthdateDisplay').show();
        $('#birthdateUpdate').hide();
    });

});