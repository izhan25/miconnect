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

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <!--Bootstrap-->
    <link rel="stylesheet" href="../include/bootstrap/bootstrap-litera.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Jquery Alert Boxes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

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

    <!-- Jquery -->
    <script src="../include/js/jquery.js"> </script>

    <!-- BootstrapJs-->
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>

    <!--Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- Jquery Alert Boxes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <!-- Home Js -->
    <script src="../include/js/home.js"></script>
</body>
</html>