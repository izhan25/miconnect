<!DOCTYPE html>
<html>
<head>
<title>MiConnect | Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="social networking website" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--Bootstrap-->
<link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">

<!-- custom css file -->
<link rel="stylesheet" href="../include/css/signupStyle.css">
<!-- //custom css file -->

<!-- google fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //google fonts -->



<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>
		
</head>

<body>
<h1>MiConnect</h1>
<h1 style="font-size: 20px; margin-top:10px;">Connect Yourself To World</h1>
<div class="agile-its">
	<h2>Sign Up</h2>
	<div class="w3layouts">
		<div class="photos-upload-view">
			<form action="/MiConnect/actions/user/signupAction.php" method="POST" class="simple-form" name="registration">
					<div class="agileinfo">
					</div>
						<div class="agileinfo-row">
							<div class="ferry ferry-from">
								<label>User Name</label>
								<input type="text" name="userName" placeholder=""  autocomplete="off" autofocus="on">
                            </div>
                            <div class="ferry ferry-from">
								<label>Full Name</label>
								<input type="text" name="fullName" placeholder="" autocomplete="off">
							</div>
							<div class="ferry ferry-from">
								<label>E-mail</label>
								<input type="email" name="email" placeholder="" autocomplete="off">
                            </div>
                            <div class="ferry ferry-from">
								<label>Contact</label>
								<input type="text" name="contact" placeholder="03328831270"  autocomplete="off">
							</div>
							<div class="ferry ferry-from">
								<label>Password</label>
								<input type="password" id="password" name="password" placeholder="">
                            </div>
                            <div class="ferry ferry-from">
								<label>Re-Enter Password</label>
								<input type="password" name="repassword" placeholder="">
                            </div>
                            <div class="ferry ferry-from">
								<label>Gender</label>
                                <input type="radio" name="gender" value="male">
                                <span class="text-white mr-3">Male</span>
                                <input type="radio" name="gender" value="female">
                                <span class="text-white">Female</span>
							</div>
							
                            <label>Date of Birth</label>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form_box" style="width:100%;">
                                        <div class="select-block1 middle">
                                            <select name="date">
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
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_box">
                                        <div class="select-block1">
                                            <select  name="month">
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
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_box1">
                                        <div class="select-block1 last">
                                            <select name="year">
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
                                </div>
                            </div>

							<div class="clear"></div>
						</div>
					<div class="wthree-text"> 
						<div class="wthreesubmitaits">
							<input type="submit" name="submit" value="Submit" >
						</div>  
					</div>
			</form>
						
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="footer">
	<p> © 2018 MiConnect. All Rights Reserved</p>
</div>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>


<script>
    // Wait for the DOM to be ready
    $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      userName: {
          required: true,
          minlength: 3,
          maxlength: 20,
          digits: false
      },
      fullName: {
          required: true,
          minlength: 5,
          maxlength: 40,
          digits: false
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      contact: {
          required: true,
          minlength: 11,
          maxlength: 11,
          digits: true
      },
      password: {
        required: true,
        minlength: 5
      },
      repassword:{
        equalTo: "#password"
      },
      gender: "required",
      date: "required",
      month: "required",
      year: "required"
    },
    // Specify validation error messages
    messages: {
      userName: {
          required: "Please provde a user name",
          minlength: "user name must conatin more than 3 chars",
          maxlength: "user name must conatin less than 20 chars",
          digits: "digits are not allowed here"
      },
      fullName: {
          required: "Please provde a full name",
          minlength: "full name must conatin more than 20 chars",
          maxlength: "full name must conatin less than 40 chars",
          digits: "digits are not allowed here"
      },
      email: "Please enter a valid email address",
      contact:{
          required: "Please provde a contact number",
          minlength: "invalid phone number",
          maxlength: "invalid phone number",
          digits: "contact must contain digits"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      repassword: {
        equalTo: "Password doesn't match"
      },
      gender: "required",
      date: "!",
      month: "!",
      year: "!"
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

</body>
</html>