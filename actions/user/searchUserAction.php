<?php

include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';
include '../middleware/app.php';

error_reporting(0);

if(isset($_POST['submit']) && !empty($_POST['submit']) ){
    
    $seacrhItem = htmlspecialchars(strip_tags($_POST['searchItem']));
    
    $user = new UserController();
    
    $users_to_display = $user->searchUser($seacrhItem);

}

?>


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