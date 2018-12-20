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