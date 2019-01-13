<?php

include '../../config/Database.php';
include '../../controllers/UserController.php';
include '../middleware/app.php';

if(isset($_POST['submit']) && !empty($_POST['submit']) ){

    $message = '';
    $body = '';


    // Initiating action from post controller 
    $action = new UserController();

    // Uploading Photo
    if($_FILES){
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        //$fileContent = file_get_contents($_FILES['file']['tmp_name']);
        $fileContent = $_FILES['file']['tmp_name'];

        if($fileError == UPLOAD_ERR_OK){

            if (move_uploaded_file($fileContent , '../../include/images/users/'.$fileName)) {
                $message = 'Uploaded Image';
            } else {
                $message = 'Some Error Occured while uploading image';
            }
        }
    }
    
    // Managing image name that will be sent to create a post
    $imageName = 'default_User.png';
    if(isset($fileName)){
        $imageName = $fileName;
    }

    // saving in database
    $result = $action->updateProfilePicture($imageName, $_SESSION['user']['id']);

    if($result){

        // removing existing Image from server
        error_reporting(0);
        try{
          $file_to_delete = '../../include/images/users/' . $_SESSION['user']['image'];
          unlink($file_to_delete);
        }
        catch(Exception $ex){
          // do nothing
        }

        // Displaying Successfull message
        echo $message;

        // Updating Session image
        $_SESSION['user']['image'] = $imageName;
    }
    else{
        echo $message;
    }
}