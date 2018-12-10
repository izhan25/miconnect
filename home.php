<?php
    include './actions/middleware/app.php';
    include './actions/middleware/authenticate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiConnect</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="./include/bootstrap/bootstrap-litera.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- My Style-->
    <link rel="stylesheet" href="./include/css/myStyle.css">

    <!-- Angular JS -->
    <script src="./include/angular/angular.min.js"></script>
    <script src="./include/angular/angular-route.js"></script>

</head>
<body ng-app="home">

    <!-- Navbar -->   
    <?php
        include './views/components/_navbar.php';
    ?>


    <!-- Content -->   
    <div class="container">
        <?php include './views/components/_home.php' ?>
    </div>




    <!--
        Scripts
    -->

    <!-- My Angular JS File -->
    <script src="./include/js/app.js"></script>
    <script src="./include/js/route.js"></script>

    <!--Jquery and BootstrapJs-->
    <script src="./include/js/jquery.js"> </script>
    <script src="./include/bootstrap/js/bootstrap.min.js"> </script>
    
    <!-- Home Js here-->

</body>
</html>