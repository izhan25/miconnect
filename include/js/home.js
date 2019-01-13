// Global Routes
const root = 'http://localhost/MiConnect/';

// on load
$('.loader-container').hide();

$(function(){
    $('.loader-container').show();
    $('#view').load( root + 'views/components/_newsFeed.php');
    $('.loader-container').hide();
});

// this function will load news feed view
function loadFeed(){
    $('#view').load( root + 'views/components/_newsFeed.php');

    // managing selected css class
    $('.option-feed').addClass('selected');
    $('.option-friends').removeClass('selected');
    $('.option-request').removeClass('selected');
    $('.option-profile').removeClass('selected');
    $('.option-album').removeClass('selected');
}

// Event Listeners for Views
$('.feedBtn').click(loadFeed);

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


// load file event [will be fired from news feed's create post section]
function loadFile(){

    const realFileBtn = document.querySelector('#postImage');
    const customText = document.querySelector('#customText');

    realFileBtn.click();

    realFileBtn.addEventListener('change', function(){
        if(realFileBtn.value){

            $('#fileSelectedDisplay').show();

            var file = parsePath(realFileBtn.value);

            customText.innerHTML = file.name;
            var validImage = validateImage(file.extension);
            if(!validImage){
                $.alert('Please Select A File of <br> .jpg  .png  .jpeg  .gif ');
                discardFile();
            }

            // enabling submit button
            document.querySelector('#postSubmitBtn').disabled = false;
        }else{

            $('#fileSelectedDisplay').hide();

            customText.innerHTML = '';

            // disabling submit button
            document.querySelector('#postSubmitBtn').disabled = true;
        }
    });

}

// this function will check that the input file is image or not
function validateImage(extension){
   switch(extension){
       case '.jpg':
            return true;
            break;
        case '.png':
            return true;
            break;
        case '.jpeg':
            return true;
            break;
        case '.gif':
            return true;
            break;
        default:
            return false;
            break;
   }
}

// This Function will extract the file name, path and extenxion from the path
function parsePath (path) {
    var parts = (/(\w?\:?\\?[\w\-_ \\]*\\+)?([\w-_ ]+)?(\.[\w-_ ]+)?/gi).exec(path);
    return {
        path: parts[0] || "",
        folder: parts[1] || "",
        name: parts[2] || "",
        extension: parts[3] || "",
    };
}

// discard file event [will be fired from news feed's create post section]
function discardFile(){
    const realFileBtn = document.querySelector('#postImage');
    const customText = document.querySelector('#customText');

    realFileBtn.value = '';
    customText.innerHTML = realFileBtn.value;

    $('#fileSelectedDisplay').hide();

    // disabling submit button
    document.querySelector('#postSubmitBtn').disabled = true;
}

// this function will disable the create new post submit button if the post body is empty
function enableSubmitBtn(){
    if($('#body').val() == ''){
        document.querySelector('#postSubmitBtn').disabled = true;
    }
    else{
        document.querySelector('#postSubmitBtn').disabled = false;
    }
}

// this function will post the body and image of the post
function submitPost(){
    const image = document.querySelector('#postImage');
    const body = document.querySelector('#body');
    const imageName = document.querySelector('#customText');

    var formData = new FormData();
    formData.append('body', body.value);
    formData.append('file', $('#postImage')[0].files[0]);
    formData.append('submit', 'submit');

    $.ajax({
        url : root + 'actions/posts/createPostAction.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
            $.alert(data);
        }
    });
    
}

// This function will get the likes of post, this function will be called from likePost function
function getLikesCount(id){
    
    $.ajax({
        url: root + 'actions/posts/getLikesCountAction.php',
        method: 'POST',
        data : {
            postId : id,
            submit : 'submit'
        },
        dataType:'JSON', 
        success: function(response){

            var counter = '';

            if(response.count == 0){
                $('#likesDisplay' + id).html(counter);
            }
            else if(response.count == 1){
                counter = response.count + ' like';
                $('#likesDisplay' + id).html(counter);
            }
            else{
                counter = response.count + ' likes';
                $('#likesDisplay' + id).html(counter);
            }
            
        },
        error: function(e){
            console.log(e.responseText);
        }
    });

}

// This function is responsible for managing the css class of like button and displaying count of likes for post
function likePost(id){
    
    $.ajax({
        url: root + 'actions/posts/likePostAction.php',
        method: 'POST',
        data : {
            postId : id,
            submit : 'submit'
        },
        dataType:'JSON', 
        success: function(response){
            if(response.message){
                $('#likeBtn'+ id).addClass('font-icon-selected');
                getLikesCount(id);
            }
            else if(!response.message){
                $('#likeBtn'+ id).removeClass('font-icon-selected');
                getLikesCount(id);
            }
            else if(response.message == 'Error in unliking the post'){
                console.log(response.message);
                getLikesCount(id);
            }
        },
        error: function(e){
            console.log(e.responseText);
        }
    });
    
}

// This function will delete a post and remove its image from server
function deletePost(id, image){

    $.confirm({
        title: 'Confirm!',
        content: 'Are You Sure You Want To Delete This Post',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: root + 'actions/posts/deletePostAction.php',
                    method: 'POST',
                    data : {
                        postId : id,
                        imageName: image,
                        submit : 'submit'
                    },
                    dataType:'JSON', 
                    success: function(response){
                        $.alert(response);
                    },
                    error: function(e){
                        $.alert(e.responseText);
                    }
                });
            },
            cancel: function () {
                // do nothing
            }
        }
    });
    
}

// Search Friends function
function searchFriend(){
    const search = $('#search').val();

    if(search == ''){
        loadUsers();
        return false;
    }

    $.ajax({
        url: root + 'actions/user/searchUserAction.php',
        method: 'POST',
        data : {
            searchItem : search ,
            submit : 'submit'
        },
        dataType:'JSON',
        success: function(response){
            $('#viewFriends').html(response.responseText);
        },
        error: function(e){
            $('#viewFriends').html(e.responseText);
        }
    });
}

// load users for find friends page
function loadUsers(){
    $('#viewFriends').load( root + 'views/components/_usersList.php');
}

// load file event [will be fired from profile's change profile photo section]
function loadFileForProfile(){

    const realFileBtn = document.querySelector('#profileImage');
    const customText = document.querySelector('#customText_ForProfile');

    realFileBtn.click();

    realFileBtn.addEventListener('change', function(){
        if(realFileBtn.value){

            $('#fileSelectedDisplay_ForProfile').show();

            var file = parsePath(realFileBtn.value);

            customText.innerHTML = file.name;
            var validImage = validateImage(file.extension);
            if(!validImage){
                $.alert('Please Select A File of <br> .jpg  .png  .jpeg  .gif ');
                discardFile();
            }

            // enabling submit button
            document.querySelector('#profileImage_SubmitBtn').disabled = false;
        }else{

            $('#fileSelectedDisplay_ForProfile').hide();

            customText.innerHTML = '';

            // disabling submit button
            document.querySelector('#profileImage_SubmitBtn').disabled = true;
        }
    });

}

// discard file event [will be fired from profile's change profile photo section]
function discardFileForProfile(){
    const realFileBtn = document.querySelector('#profileImage');
    const customText = document.querySelector('#customText_ForProfile');

    realFileBtn.value = '';
    customText.innerHTML = realFileBtn.value;

    $('#fileSelectedDisplay_ForProfile').hide();

    // disabling submit button
    document.querySelector('#profileImage_SubmitBtn').disabled = true;
}

// this function will update the profile picture
function submitProfilePicture(){
    const image = document.querySelector('#profileImage');
    const imageName = document.querySelector('#customText_ForProfile');

    var formData = new FormData();
    formData.append('file', $('#profileImage')[0].files[0]);
    formData.append('submit', 'submit');

    $.ajax({
        url : root + 'actions/user/updateProfileImageAction.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
            // showing successfull message
            $.alert(data);
        }
    });
    
}






















function editPost(id){

    const postBody = $('#postBody'+id).html();
    const postImage = $('#postImage'+id);
    
    $('#editBody').html(postBody);

    var src = $('#postImage'+id).attr('src');
    if(src){
        $('#editPostImageDisplay').attr("src", src);
        $('#editPostImageRow').show();
        $('#openFileBtn').hide();    
    }
    else{
        $('#editPostImageRow').hide();
        $('#openFileBtn').show();    
    }
    
    $('#editFileSelectedDisplay').hide();

}


function enableEditSubmitBtn(){
    document.querySelector('#editPostSubmitBtn').disabled = false;
}

function loadEditFile(){

    const realFileBtn = document.querySelector('#editPostImage');
    const customText = document.querySelector('#editCustomText');

    realFileBtn.click();

    realFileBtn.addEventListener('change', function(){
        if(realFileBtn.value){

            $('#editFileSelectedDisplay').show();

            var file = parsePath(realFileBtn.value);

            customText.innerHTML = file.name;
            var validImage = validateImage(file.extension);
            if(!validImage){
                $.alert('Please Select A File of <br> .jpg  .png  .jpeg  .gif ');
                discardEditFile();
            }

            // enabling submit button
            document.querySelector('#editPostSubmitBtn').disabled = false;
        }else{

            $('#editFileSelectedDisplay').hide();

            customText.innerHTML = '';

            // disabling submit button
            document.querySelector('#editPostSubmitBtn').disabled = true;
        }
    });

}

function discardEditFile(){
    const realFileBtn = document.querySelector('#editPostImage');
    const customText = document.querySelector('#editCustomText');

    realFileBtn.value = '';
    customText.innerHTML = realFileBtn.value;

    $('#editFileSelectedDisplay').hide();

    // disabling submit button
    document.querySelector('#editPostSubmitBtn').disabled = true;
}
