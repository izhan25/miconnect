<?php
    include '../actions/middleware/app.php';
    include '../actions/middleware/authenticate.php';

    include '../config/Database.php';
    include '../models/Post.php';
    include '../controllers/PostController.php';
    include '../controllers/UserController.php';

    $user = new UserController();
    $post = new PostController();

    // Fetching Tables
    $posts = $post->getPosts();
    $users = $user->getUsers();
    $friends = $user->getFriends($_SESSION['user']['id']);
    $requests = $user->getRequests($_SESSION['user']['id']);

    // filtering posts so only friends's posts will display
    $filteredPosts = array();

    if($friends != 'No Friends Found'){
        foreach($posts as $post){
            foreach($friends as $friend){
                if($post['user_id'] == $friend['friend_id']){
                    array_push($filteredPosts, $post);
                }
            }
        }
    }

    // filtering users to sent them request
    $notFriends = array();

    foreach($user as $user){
        foreach($friends as $friend){
            if($user['id'] == $friend['friend_id']){
                array_push($notFriends, $user);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiConnect</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="../include/bootstrap/bootstrap-litera.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- My Style-->
    <link rel="stylesheet" href="../include/css/myStyle.css">

    <!--Jquery and BootstrapJs-->
    <script src="../include/js/jquery.js"> </script>
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>

</head>
<body>

    <!-- Navbar -->   
    <?php
        include 'components/_navbar.php';
    ?>


    <!-- Content -->   
    <div class="container">
        <?php include './components/_home.php' ?>
    </div>

    <!--
        Scripts
    -->

    
    
    <!-- Home Js -->
    <script src="../include/js/home.js"></script>
</body>
</html>