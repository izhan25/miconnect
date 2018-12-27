<?php

include '../../config/Database.php';
include '../../models/Post.php';
include '../middleware/app.php';
include '../../controllers/PostController.php';


if(isset($_POST['submit']) && !empty($_POST['submit'])){
    
    // Initiating Variables
    $postId = $_POST['postId'];
    $userId = $_SESSION['user']['id'];
    $image = $_POST['imageName'];

    // Initiating action from Post Controller
    $action = new PostController();

    // Getting result
    $result = $action->deletePost($postId, $image);

    echo $result;


}