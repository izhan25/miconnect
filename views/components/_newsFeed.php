<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';

    include '../../config/Database.php';
    include '../../models/Post.php';
    include '../../controllers/PostController.php';
    include '../../controllers/UserController.php';

    $user = new UserController();
    $postAction = new PostController();

    // Fetching Tables
    $posts = $postAction->getPosts();
    $users = $user->getUsers();
    $friends = $user->getFriends($_SESSION['user']['id']);
    $requests = $user->getRequests($_SESSION['user']['id']);

    // filtering posts so only friends's posts will display
    $filteredPosts = array();

    foreach($posts as $post){
        if($post['user_id'] == $_SESSION['user']['id']){
            array_push($filteredPosts, $post);
        }
    }

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
            <form id="createPostForm">
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

                <div class="card" id="post<?php echo $post['id'] ?>">

                    <!-- ROW FOR : user image and user name -->
                    <div class="card-header">

                        <div class="row">
                            <?php foreach($users as $user): ?>
                                <?php if($post['user_id'] == $user['id']): ?>
                                    <div class="col-xs-3">
                                        <div class="user-post-image">
                                            <img src="<?php echo $root ?>include/images/users/<?php echo $user['image'] ?>" 
                                                class="img-fluid img-thumbnail"
                                            >
                                        </div>
                                        
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

                        <!-- ROW FOR : post image -->
                        <?php if($post['image'] != 'default-post.jpg'): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo $root ?>include/images/posts/<?php echo $post['image'] ?>" 
                                        class="img-fluid mx-auto d-block"
                                        id="postImage<?php echo $post['id'] ?>"
                                        style="max-height: 500px;"
                                    >
                                </div>
                            </div>
                        <?php endif ?>


                        <!-- ROW FOR : post body -->
                        <div class="row mt-2 mb-2">
                            <div class="col-md-12">
                                
                                <?php
                                    echo '<p class="card-text"
                                                id="postBody'.$post['id'].'"
                                            >'.$post['body'].'</p>';
                                ?>

                            </div>
                        </div>

                        <hr>

                         <!-- ROW FOR : post actions  -->
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                    // Getting Count of likes
                                    $likesCount = $postAction->get_Likes_Count($post['id']);
                                ?>

                                <i class="fa fa-thumbs-o-up font-icon list-icons" 
                                    aria-hidden="true"
                                    onclick="likePost('<?php echo $post['id'] ?>')"
                                    id="likeBtn<?php echo $post['id'] ?>"
                                ></i>
                                <i id="likesDisplay<?php echo $post['id'] ?>"> 
                                    <?php 
                                        if($likesCount['COUNT(user_id)'] > 0){
                                            echo  $likesCount['COUNT(user_id)'];
                                        
                                            if($likesCount['COUNT(user_id)'] == 1){
                                                echo ' like';
                                            }
                                            else{
                                                echo ' likes';
                                            }
                                        }
                                    ?> 
                                </i>

                                <?php if($_SESSION['user']['id'] == $post['user_id']): ?>
                                    <i class="fa fa-pencil-square-o ml-3 font-icon list-icons float-right" 
                                        aria-hidden="true"
                                        data-toggle="modal" data-target="#editPostModal" 
                                        onclick="editPost('<?php echo $post['id'] ?>')"
                                    ></i>
                                    <i class="fa fa-times ml-3 font-icon list-icons float-right" 
                                        aria-hidden="true" 
                                        onclick="deletePost('<?php echo $post['id'] ?>', '<?php echo $post['image'] ?>')"
                                    ></i>
                                <?php endif ?>

                                

                            </div>
                        </div>

                        <hr>
                        
                        <!-- ROW FOR : post date -->
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                    // formatting date of post
                                    $s = $post['created_at'];
                                    $dt = new DateTime($s);
                                    
                                    $date = $dt->format('d-m-Y');
                                    $time = $dt->format('H:i');
                                    
                                ?>

                                <label class="float-right post-date">Posted On <b><?php echo $date, ' | ', $time; ?></b></label>

                            </div>
                        </div>
                        
                    </div>
                </div>
                <hr>
            <?php endforeach ?>
            
            <br><br><br>
        </div>
    </div>
</div>

<!-- Modal Edit Post-->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPost" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center" id="editPost">Edit Your Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPostForm">
                    <div class="form-group">
                        <textarea name="editBody" id="editBody" cols="30" rows="5" class="form-control" onkeyup="enableEditSubmitBtn()"></textarea>
                    </div>

                    <div class="row" id="editPostImageRow">
                        <div class="col-md-12" >
                            
                            <img src="" 
                                    id="editPostImageDisplay" 
                                    class="img-fluid mx-auto d-block edit-post-image" 
                                    data-toggle="tooltip" 
                                    title="Click to change Image"
                                    alt="post-image" 
                                    onclick="loadEditFile()"
                            >
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="file" name="editPostImage" id="editPostImage" hidden="hidden">
                    </div>
                    <div class="form-group">

                        <i class="fa fa-picture-o fa-2x float-left font-icon" style="cursor:pointer;" id="openFileBtn" onclick="loadEditFile()"></i>

                        <span id="editFileSelectedDisplay">
                            <label class="ml-1 mt-1" id="editCustomText">No File</label>
                            <label class="ml-1 mt-1 font-icon" style="cursor:pointer;" onclick="discardEditFile()">&times;</label>
                        </span>
                        
                        <input type="button" id="editPostSubmitBtn" value="Update Post" class="btn btn-primary float-right" onclick="submitEditPost()">
                    </div>
                </form>
            </div>
            <div class="modal-footer message" id="editPostMessageBox">
                <label id="editPostRES"></label>
            </div>
        </div>
    </div>
</div>


<script>
    $('#fileSelectedDisplay').hide();
    document.querySelector('#postSubmitBtn').disabled = true;
</script>