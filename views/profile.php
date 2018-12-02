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
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered user-table">
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
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-default btn-sm float-right" style="border-radius: 5px;" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                    </div>
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

    <!-- Modal Edit Profile-->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="profile">Update Profile Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/MiConnect/actions/user/updateImageAction.php" id="signupForm" method="POST" name="registration">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" id="userName" value="<?php echo $_SESSION['user']['user_name'] ?>" name="userName" placeholder=""  autocomplete="off" autofocus="on" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" id="fullName" value="<?php echo $_SESSION['user']['full_name'] ?>" name="fullName" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" id="email" value="<?php echo $_SESSION['user']['email'] ?>" name="email" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" id="contact" value="<?php echo $_SESSION['user']['contact'] ?>" name="contact" placeholder="03328831270"  autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="form-control">
                                <input type="radio" id="genderM" name="gender" value="male">
                                <span class="mr-3">Male</span>
                                <input type="radio" id="genderF" name="gender" value="female">
                                <span>Female</span>
                            </div>
                        </div>
                                    
                        <label>Date of Birth</label>
                        <div class="row" id="birthdateDisplay">
                            <div class="col-md-12">
                                <label><?php echo $_SESSION['user']['birth_date'] ?></label>
                                <span><button id="editBirthDate" class="btn btn-sm btn-default">change</button></span>
                            </div>
                        </div>
                        <div class="row" id="birthdateUpdate">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="date" name="date" class="form-control">
                                        <option value="">Date</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="month"  name="month" class="form-control">
                                        <option value="">Month</option>
                                        <option value="jan">January</option>
                                        <option value="feb">February</option>
                                        <option value="mar">March</option>
                                        <option value="apr">April</option>
                                        <option value="may">May</option>
                                        <option value="jun">June</option>
                                        <option value="jul">July</option>
                                        <option value="aug">August</option>
                                        <option value="sep">September</option>
                                        <option value="oct">October</option>
                                        <option value="nov">November</option>
                                        <option value="dec">December</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="year" name="year" class="form-control">
                                        <option value="">Year</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="discardBirthDate" class="btn btn-sm btn-default float-right">Discard</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="wthree-text"> 
                            <input type="submit" id="signup" name="submit" value="Submit" class="btn btn-index btn-block btn-primary mt-4 mb-2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer message" id="signinMessageBox">
                    <label id="editProfileRES"></label>
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