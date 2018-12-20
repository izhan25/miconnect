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
    
    <!-- My Style-->
    <link rel="stylesheet" href="include/css/myStyle.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

    <!-- Navbar -->   
    <?php
        include 'views/components/_navbar.php';
    ?>

    <!-- Content -->   
    <div class="d-flex justify-content-center" style="margin-top: 5%;">
        <div class="logo">M</div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 20px;">
        <a href="#" class="btn btn-outline-primary btn-lg btn-index" data-toggle="modal" data-target="#signupForm">Signup</a>
        <a href="#" class="btn btn-outline-primary btn-lg btn-index" style="margin-left: 20px;" data-toggle="modal" data-target="#signinForm">Signin</a>
    </div>

    <!-- Modal Sign In-->
    <div class="modal fade" id="signinForm" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" id="signin">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="login">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" id="signinNAME" name="userName" class="form-control" placeholder="Enter Your User Name Here">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="signinPWD" name="password" class="form-control" placeholder="Enter Your Password Here">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="signin" name="signin" value="Sign In" class="btn btn-index btn-block btn-primary mt-4">
                        </div>
                    </form>
                </div>
                <div class="modal-footer message" id="signinMessageBox">
                    <label id="signinRES"></label>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sign Up-->
    <div class="modal fade" id="signupForm" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signin">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/MiConnect/actions/user/signupAction.php" id="signupForm" method="POST" name="registration">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" id="userName" name="userName" placeholder=""  autocomplete="off" autofocus="on" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" id="fullName" name="fullName" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" id="email" name="email" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" id="contact" name="contact" placeholder="03328831270"  autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" id="password" name="password" placeholder="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Re-Enter Password</label>
                            <input type="password" name="repassword" placeholder="" class="form-control">
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
                        
                        <div class="wthree-text"> 
                            <input type="submit" id="signup" name="submit" value="Submit" class="btn btn-index btn-block btn-primary mt-4 mb-2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer message" id="signupMessageBox">
                    <label id="signupRES"></label>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include 'views/components/_footer.php';
    ?>






    <!--
        Scripts
    -->



    <!--Jquery and BootstrapJs-->
    <script src="include/js/jquery.js"> </script>
    <script src="include/bootstrap/js/bootstrap.min.js"> </script>

    <!--Jquery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!--Sign up Validation-->
    <script src="include/js/signupValidation.js"></script>

    <!-- Sign In Validation -->
    <script src="include/js/signinValidation.js"></script>
    
</body>
</html>