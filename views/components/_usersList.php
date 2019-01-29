<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';
    include '../../actions/middleware/print_array.php';

    include '../../config/Database.php';
    include '../../models/Post.php';
    include '../../controllers/PostController.php';
    include '../../controllers/UserController.php';

    $user = new UserController();

    error_reporting(0);

    // Fetching Tables
    $users = $user->getUsers();
    $friends = $user->getFriends($_SESSION['user']['id']);
    $requests = $user->getRequestsofUser($_SESSION['user']['id']);


    // filtering users to sent them request
    $users_to_display = $users;

    // Reducing logged in user from User to display
    $loginUser = array_search($_SESSION['user'] , $users_to_display);
    unset($users_to_display[$loginUser]);

    // This function takes an array of objects i.e @users and checks whether th given @id is in there or not
    function searchUser($id, $users){
        foreach($users as $user){
            if($user['id'] == $id){
                $friendFound = array_search($user, $users);
                unset($users[$friendFound]);
            }
        }
        return $users;
    }

    // Reducing friends from User to display
    foreach($friends as $friend){
        $users_to_display = searchUser($friend['friend_id'], $users_to_display);
    }
  
    // Reducing Requests from User to display
    if($requests != 'No Requests Found'){
        foreach($requests as $request){
            $users_to_display = searchUser($request['req_id'], $users_to_display);
        }
    }

    


?>



<!-- Searched Content -->
<div class="row mt-4">
    <div class="col-md-12">
        <?php foreach($users_to_display as $user): ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="../include/images/users/<?php echo $user['image'] ?>"
                            class="img-fluid img-thumbnail user-post-image ml-3">
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
                        <button class="btn btn-primary btn-sm float-right text-capitalize"
                            id="<?php echo $user['id'] ?>" onclick="sendRequest('<?php echo $user['id'] ?>')">
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