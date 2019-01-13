<?php

include '../../config/Database.php';
include '../../models/Post.php';
include '../../controllers/PostController.php';
include '../middleware/app.php';

if(isset($_POST['submit']) && !empty($_POST['submit'])){

    // getting post body
    $body = htmlspecialchars(strip_tags($_POST['body']));
    $postId = htmlspecialchars(strip_tags($_POST['postId']));

    // Initiating action from post controller 
    $action = new PostController();

    if(isset($_POST['prevImg']) && !empty($_POST['prevImg'])){
        // prev img is inserting

        $result = $action->updatePostBody($body, $postId);

        if($result){
            echo 'Post Updated';
        }
        else{
            echo 'Some Error Occured While Updating Post';
        }

    }
    else if(isset($_FILES) && !empty($_FILES)){
        // new file is uploading

        if($_FILES){
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileError = $_FILES['file']['error'];
            //$fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $fileContent = $_FILES['file']['tmp_name'];
    
            if($fileError == UPLOAD_ERR_OK){
    
                if (move_uploaded_file($fileContent , '../../include/images/posts/'.$fileName)) {
                    $message = 'Uploaded Image';
                } else {
                    $message = 'Some Error Occured while uploading image';
                }
            }
        }
        
        // Managing image name that will be sent to create a post
        $imageName = 'default-post.jpg';
        if(isset($fileName)){
            $imageName = $fileName;
        }
    
        // updating a post
        $result = $action->updatePost($body, $imageName, $postId);

        if($result){
            echo 'Post Updated';
        }
        else{
            echo 'Some Error Occured While Updating Post';
        }
    }
    else{
        // file is not inserting

        $result = $action->uploadPostBodyAndImage($body, $postId, $image = 'default-post.jpg');

        if($result){
            echo 'Post Updated';
        }
        else{
            echo 'Some Error Occured While Updating Post';
        }
    }

}