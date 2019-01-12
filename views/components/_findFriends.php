<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';

    include '../../config/Database.php';
    include '../../models/Post.php';
    include '../../controllers/PostController.php';
    include '../../controllers/UserController.php';

    $user = new UserController();
    $post = new PostController();

    // Fetching Tables
    $posts = $post->getPosts();
    $users = $user->getUsers();
    $friends = $user->getFriends($_SESSION['user']['id']);
    $requests = $user->getRequests($_SESSION['user']['id']);

    // filtering posts so only friends's posts will display
    $filteredPosts = array();

    if($friends != 'No Friends Found'){
        foreach($posts as $post){
            foreach($friends as $friend){
                if($post['user_id'] == $friend['friend_id']){
                    array_push($filteredPosts, $post);
                }
            }
        }
    }

    // filtering users to sent them request
    $notFriends = array();

    foreach($user as $user){
        foreach($friends as $friend){
            if($user['id'] == $friend['friend_id']){
                array_push($notFriends, $user);
            }
        }
    }
?>
<div id="findFriends">
    
    <!-- Search Box -->
    <div class="row mt-5">
        <div class="col-md-12">
            
            <form>
                <div class="form-group">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter Any Name Here..." onkeyup="searchFriend()" autofocus>
                </div>
                <div class="form-group">
                  <input type="submit"  value="Search" class="btn btn-primary float-right">
                </div>
            </form>
                
        </div>
    </div>

    <div id="viewFriends">
    </div>

    <script>
        loadUsers();
    </script>

    

</div>