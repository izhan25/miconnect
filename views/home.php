<?php
    include '../actions/middleware/app.php';
    include '../actions/middleware/authenticate.php';

    include '../config/Database.php';
    include '../models/Post.php';
    include '../controllers/PostController.php';
    include '../controllers/UserController.php';
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

    <!--Jquery and BootstrapJs-->
    <script src="../include/js/jquery.js"> </script>
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>
    
    <!-- Home Js -->
    <script src="../include/js/home.js"></script>
</body>
</html>