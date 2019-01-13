<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';
    include '../../actions/middleware/print_array.php';

    include '../../config/Database.php';
    include '../../models/Post.php';
    include '../../controllers/PostController.php';
    include '../../controllers/UserController.php';

    $user = new UserController();

    // Fetching Tables
    $users = $user->getUsers();
    $friends = $user->getFriends($_SESSION['user']['id']);
    $requests = $user->getRequests($_SESSION['user']['id']);

    // filtering posts so only friends's posts will display
    $filteredPosts = array();

    // filtering users to sent them request
    $users_to_display = $users;


    $loginUser = array_search($_SESSION['user'] , $users_to_display);
   // echo $loginUser;
    //print_array("USERS", $users_to_display);

    unset($users_to_display[$loginUser]);


?>
    


<!-- Searched Content -->
<div class="row mt-4">
    <div class="col-md-12">
        <?php foreach($users_to_display as $user): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="../include/images/users/<?php echo $user['image'] ?>" class="img-fluid img-thumbnail user-post-image ml-3">
                        </div>
                        <div class="col-xs-7">
                            <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2 name-feed" 
                                   onclick="displayProfile('<?php echo $user['user_name'] ?>')">
                                <?php echo $user['full_name'] ?>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <button 
                                class="btn btn-primary btn-sm float-right text-capitalize" 
                                id="<?php echo $user['id'] ?>" 
                                onclick="sendRequest('<?php echo $user['id'] ?>')"
                            >
                                Send Request
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php endforeach ?>
    </div>
</div>