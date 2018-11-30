<?php
    include '../actions/middleware/app.php';
    include '../actions/middleware/authenticate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiConnect</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="../include/bootstrap/bootstrap-litera.css"></head>
<body>

    <!-- Navbar -->   
    <?php
        include 'components/_navbar.php';
    ?>


    <!-- Content -->   
    <h2>Home Page Works</h2>





    <!--
        Scripts
    -->

    <!--Jquery and BootstrapJs-->
    <script src="../include/js/jquery.js"> </script>
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>
    
</body>
</html>