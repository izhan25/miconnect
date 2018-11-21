<?php
include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';

if( isset($_POST['userName']) && !empty($_POST['userName']) ) {
    if( isset($_POST['password']) && !empty($_POST['password']) ){
        $name = $_POST['userName'];
        $pass = $_POST['password'];

        // Initializing user object
        $user = new User();
        $user->user_name = $name;
        $user->password = $pass;


        // initializing action object from user controller
        $action = new UserController();

        // passing user to action object and getting the result
        $result = $action->signin($user);

        // Get row count
        $num = $result->rowCount();

        // check if any user found
        if($num > 0){
            // signin success
            $message = 'Signed In';
        }
        else{
            // signin failed
            $message = 'User Not Found';
        }

        echo json_encode( array("message"=>$message) );
    }
    
}