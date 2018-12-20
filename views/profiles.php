<?php

    include '../actions/middleware/app.php'; 
    include '../actions/middleware/authenticate.php';

    include '../config/Database.php';
    include '../models/Post.php';
    include '../controllers/PostController.php';
    include '../controllers/UserController.php';

   

    if(isset($_GET['user']) && !empty($_GET['user'])){
        
        $userName = $_GET['user'];

        $userController = new UserController();

        $user = $userController->getUserByName($userName);

        if($user == 'No User Found'){
            header('location: '.$root);
        }
        
    }
    else
    {
        header('location: '.$root);
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <!--Jquery and BootstrapJs-->
    <script src="../include/js/jquery.js"> </script>
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>

    <!--Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- Jquery Alert Boxes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

</head>
<body>

    <!-- Navbar -->   
    <?php
        include 'components/_navbar.php';
    ?>


    <!-- Content -->   
    <div class="container">
        
        <!-- Back Button -->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-default" onclick="backToHome()">Back</button>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <img src="<?php echo $root ?>include/images/users/<?php echo $_SESSION['user']['image'] ?>" 
                    class="img-fluid img-profile mx-auto d-block user-image" 
                    alt="Profile_Image" 
                    data-toggle="modal" 
                    data-target="#showImage">
            </div>
        </div>

    </div>

    <!-- Modal Show picture-->
    <div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="image" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?php echo $root ?>include/images/users/<?php echo $_SESSION['user']['image'] ?>" 
                                    alt="Profile_Image"
                                    class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
                <div class="modal-footer message" id="signinMessageBox">
                    <label id="updateImageRES"></label>
                </div>
            </div>
        </div>
    </div>

    <!--
        Scripts
    -->

    <!-- Home Js -->
    <script src="../include/js/home.js"></script>
</body>
</html>