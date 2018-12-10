<?php

    include './actions/middleware/app.php';

    if(isset($_SESSION['user'])){
        header('location: '. $home);
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
    <link rel="stylesheet" href="include/bootstrap/bootstrap-litera.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./include/fontAwesome/font-awesome.min.css">
    
    <!-- My Style-->
    <link rel="stylesheet" href="include/css/myStyle.css">

    
    
</head>
<body ng-app="home" ng-controller="ctrl">

    <!-- Navbar -->   
    <?php
        include 'views/components/_navbar.php';
    ?>

    <div ng-view></div>

    

    <!--
        Scripts
    -->

    
    <!--Jquery and BootstrapJs-->
    <script src="include/js/jquery.js"> </script>
    <script src="include/bootstrap/js/bootstrap.min.js"> </script>

    <!--Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- Angular JS -->
    <script src="./include/angular/angular.min.js"></script>
    <script src="./include/angular/angular-route.js"></script>

    <!-- jpkleemans/angular-validate -->
    <script src="./include/angular/angular-validate.min.js"></script>

    <!--Sign up Validation-->
    <script src="include/js/signupValidation.js"></script>

    <!-- Sign In Validation -->
    <script src="include/js/signinValidation.js"></script>

    <!-- My Angular JS File -->
    <script src="./include/js/app.js"></script>
    <script src="./include/js/route.js"></script>



</body>
</html>