<?php

include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';
include '../middleware/app.php';

if(isset($_GET['user_id']) && !empty($_GET['user_id'])){

    // Initializing user controller object
    $action = new UserController();
   
    // Initializing variables
    $id = $_GET['user_id'];
    $sender = $_SESSION['user']['id'];

    // sending Request 
    $result = $action->sendRequest($id, $sender);
    
    
    // printing result
    echo json_encode( array("message"=>$result, "requested"=>$id) );

}
