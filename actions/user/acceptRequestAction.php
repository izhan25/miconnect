<?php

include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';
include '../middleware/app.php';

if(isset($_GET['user_id']) && !empty($_GET['user_id'])){


    // Initializing user controller object
    $action = new UserController();
   
    // Initializing variables
    $sender = $_GET['user_id'];
    $acceptor = $_SESSION['user']['id'];

    // accepting Request 
    $result = $action->acceptRequest($acceptor, $sender);
    
    // printing result
    echo json_encode( array("message"=>$result, "requested"=>$sender) );

}
