<?php 

include '../../config/Database.php';
include '../../models/User.php';
include '../../controllers/UserController.php';

// for sign up
if(isset($_POST['submit'])){

    $user = new User();

    $user->user_name = htmlspecialchars(strip_tags($_POST['userName']));
    $user->full_name = htmlspecialchars(strip_tags($_POST['fullName']));
    $user->email = htmlspecialchars(strip_tags($_POST['email']));
    $user->contact = htmlspecialchars(strip_tags($_POST['contact']));
    $user->password = htmlspecialchars(strip_tags($_POST['password']));
    $user->gender = htmlspecialchars(strip_tags($_POST['gender']));
    $user->image = 'default_User.png';

    // generating date string
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $user->birth_date = $date.'/'.$month.'/'.$year;

    $action = new UserController();

    $result = $action->signup($user);

    echo json_encode( array("message"=> $result) );

}