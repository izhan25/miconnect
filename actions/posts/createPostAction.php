<?php

include '../../config/Database.php';
include '../../models/Post.php';
include '../../controllers/PostController.php';
include '../middleware/app.php';


if(isset($_POST['submit']) && !empty($_POST['submit']) ){

    $message = '';

    if($_FILES){
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);

        if($fileError == UPLOAD_ERR_OK){

            // if no error occur in file uploading
            if (move_uploaded_file($_FILES['file']['tmp_name'], '../../include/images/posts/'.$fileName)) {
                $message = 'Uploaded Image';
            } else {
               $message = 'Some Error Occured while uploading image';
            }
        }
    }

    if(isset($_POST['body']) && !empty($_POST['body'])){
        
        // getting post body
        $body = htmlspecialchars(strip_tags($_POST['body']));

        // Initiating action from post controller 
        $action = new PostController();
        
        // Managing image name that will be sent to create a post
        $imageName = 'default-post.jpg';
        if(isset($fileName)){
            $imageName = $fileName;
        }

        // creating a post
        $result = $action->createPost($body, $imageName, $_SESSION['user']['id']);

        $message .= '<br>'.$result;

    }
    
    echo $message;
}




