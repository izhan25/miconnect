<?php
    include '../../actions/middleware/app.php';
    include '../../actions/middleware/authenticate.php';

    include '../../config/Database.php';
    include '../../models/Post.php';
    include '../../controllers/PostController.php';
    include '../../controllers/UserController.php';

    $user = new UserController();

    $users = $user->getUsers();

    $requests = $user->getRequests($_SESSION['user']['id']);

    
?>

<div id="Requests">

    <div class="row">
        <div class="col-md-12">
            <label class="text-primary p-2 d-block">Your Requests:</label>
        </div>
    </div>

        <?php if($requests == 'No Requests Found'): ?>
            <div class="text-center mt-4" style="color: gray;">
                <h4><?php echo $requests ?></h4>
                <br>
                <i class="fa fa-rocket fa-5x" aria-hidden="true"></i>
            </div>
            
        <?php endif ?>

        <?php if($requests != 'No Requests Found'): ?>
            
            <?php foreach($requests as $request): ?>
                <?php foreach($users as $user): ?>
                    <?php if($request['user_id'] == $user['id']): ?>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="<?php echo $root ?>include/images/users/<?php echo $user['image'] ?>" 
                                             class="img-fluid img-thumbnail user-post-image ml-3">
                                    </div>
                                    <div class="col-xs-7">
                                        <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2 name-feed" 
                                               onclick="displayProfile('<?php echo $user['user_name'] ?>')"
                                        >
                                            <?php echo $user['full_name'] ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button 
                                            class="btn btn-primary btn-sm float-right text-capitalize " 
                                            id="<?php echo $user['id'] ?>" 
                                            onclick="acceptRequest('<?php echo $user['id'] ?>')"
                                        >
                                            Accept
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        

                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>

        <?php endif ?>
            
</div>



