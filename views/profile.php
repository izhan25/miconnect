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
    <link rel="stylesheet" href="../include/bootstrap/bootstrap-litera.css">

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
        <div class="row">
            <div class="col-md-4">
                <img src="../include/images/<?php echo $_SESSION['user']['image'] ?>" 
                     alt="profile-image"
                     class="img-fluid user-image"
                >
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover user-table">
                        <tbody>
                            <tr>
                                <td>User Name:</td>
                                <td><?php echo $_SESSION['user']['user_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Full Name:</td>
                                <td class="text-capitalize"><?php echo $_SESSION['user']['full_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $_SESSION['user']['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Contact:</td>
                                <td><?php echo $_SESSION['user']['contact'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><?php echo $_SESSION['user']['gender'] ?></td>
                            </tr>
                            <tr>
                                <td>Birth Date:</td>
                                <td><?php echo $_SESSION['user']['birth_date'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   


    <!-- Modal change picture-->
    <div class="modal fade" id="updateImage" tabindex="-1" role="dialog" aria-labelledby="image" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="image">Update Profile Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="login">
                        <div class="form-group">
                            <label>Browse</label>
                            <input type="file" id="selectedImage" name="selectedImage" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submitImage" name="submitImage" value="Update Image" class="btn btn-index btn-block btn-primary mt-4">
                        </div>
                    </form>
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

    <!--Jquery and BootstrapJs-->
    <script src="../include/js/jquery.js"> </script>
    <script src="../include/bootstrap/js/bootstrap.min.js"> </script>

    <!-- Profile Script -->
    <script src="../include/js/profile.js"> </script>
</body>
</html>