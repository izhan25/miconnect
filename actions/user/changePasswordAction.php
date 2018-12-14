<?php

include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';
include '../middleware/app.php';

if(isset($_POST['currentPassword']) && !empty($_POST['currentPassword'])){
    if(isset($_POST['newPassword']) && !empty($_POST['newPassword'])){
        
        // Defining Variables
        $currentPassword = htmlspecialchars(strip_tags($_POST['currentPassword']));
        $newPassword = htmlspecialchars(strip_tags($_POST['newPassword']));

        // encrypting current password
        $encCurrentPassword = md5($currentPassword);

        // validating the current password
        if($_SESSION['user']['password'] == $encCurrentPassword){

            // Initializing action object from user controller
            $action = new UserController();

            // Calling change password method from controller
            $result = $action->changePassword($newPassword, $_SESSION['user']['id']);

            if($result == 'Password Changed'){
                $success = true;
            }
            else{
                $success = false;
            }
            
            echo json_encode(array("message"=>$result, "success"=>$success, "url"=>$root));
            
            session_destroy();
        }
        else{
            // if password doesn't match the current password
            $result = 'You Entered Wrong Current Password';
            $success = false;
            echo json_encode( array("message"=> $result, "success"=>$success) );
        }

        

    }
}