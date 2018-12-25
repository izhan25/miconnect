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

<div id="newsFeed">
    <!-- Create New Post -->
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Create a new post to share with your friends" onkeyup="enableSubmitBtn()"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="postImage" id="postImage" hidden="hidden">
                </div>
                <div class="form-group">
                    <i class="fa fa-picture-o fa-2x float-left font-icon" style="cursor:pointer;" onclick="loadFile()"></i>

                    <span id="fileSelectedDisplay" onload="fileSelected()">
                        <label class="ml-1 mt-1" id="customText">No File</label>
                        <label class="ml-1 mt-1 font-icon" style="cursor:pointer;" onclick="discardFile()">&times;</label>
                    </span>
                    
                    <input type="button" id="postSubmitBtn" value="Create Post" class="btn btn-primary float-right" onclick="submitPost()">
                </div>
            </form>
        </div>
    </div>

    <!-- Posts -->
    <div class="row mt-3">
        <div class="col-md-12">

            <?php foreach($filteredPosts as $post): ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            
                            <?php foreach($users as $user): ?>
                                <?php if($post['user_id'] == $user['id']): ?>
                                    <div class="col-xs-3">
                                        <img src="../include/images/users/<?php echo $user['image'] ?>" class="img-fluid img-thumbnail user-post-image">
                                    </div>
                                    <div class="col-xs-7">
                                        <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2 name-feed" 
                                               onclick="displayProfile('<?php echo $user['user_name'] ?>')"
                                        >
                                            <?php echo $user['full_name'] ?>
                                        </label>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $post['body'] ?></p>
                        <i class="fa fa-thumbs-o-up side-nav-option list-icons" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square-o ml-3 side-nav-option list-icons" aria-hidden="true"></i>
                    </div>
                </div>
                <hr>
            <?php endforeach ?>
            
            <br><br><br>
        </div>
    </div>
</div>

<script>
    $('#fileSelectedDisplay').hide();
    document.querySelector('#postSubmitBtn').disabled = true;
</script>