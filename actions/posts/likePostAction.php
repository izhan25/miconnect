<?php

include '../../config/Database.php';
include '../../models/Post.php';
include '../middleware/app.php';
include '../../controllers/PostController.php';

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    
    // Initiating Variables
    $postId = $_POST['postId'];
    $userId = $_SESSION['user']['id'];

    // Initiating action from Post Controller
    $action = new PostController();

    // Getting result
    $result = $action->likePost($postId, $userId);

    echo json_encode( array(
        "message"=>$result
    ) );

}