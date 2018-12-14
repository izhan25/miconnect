
// content
const newsFeed = $('#newsFeed');
const findFriends = $('#findFriends');
const friendRequests = $('#Requests');
const profile = $('#profile');
const album = $('#album');

// Hiding all content
newsFeed.show();
findFriends.hide();
friendRequests.hide();
profile.hide();
album.hide();

// Event Listeners
$('.feedBtn').click(feedFunc);
$('.friendsBtn').click(friendsFunc);
$('.RequestBtn').click(requestFunc);
$('.ProflileBtn').click(profileFunc);
$('.AlbumBtn').click(albumFunc);



// functions
function feedFunc(){
    newsFeed.show();
    findFriends.hide();
    friendRequests.hide();
    profile.hide();
    album.hide();

}
function friendsFunc(){
    newsFeed.hide();
    findFriends.show();
    friendRequests.hide();
    profile.hide();
    album.hide();

}
function requestFunc(){
    newsFeed.hide();
    findFriends.hide();
    friendRequests.show();
    profile.hide();
    album.hide();
}
function profileFunc(){
    newsFeed.hide();
    findFriends.hide();
    friendRequests.hide();
    profile.show();
    album.hide();
}
function albumFunc(){
    newsFeed.hide();
    findFriends.hide();
    friendRequests.hide();
    profile.hide();
    album.show();
}

