<?php
    include '../../actions/middleware/app.php';
    include '../../actions/middleware/authenticate.php';
?>
<div id="profile">

    <!-- Profile Image -->
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo $root ?>include/images/users/<?php echo $_SESSION['user']['image'] ?>"
                class="img-fluid img-thumbnail mx-auto d-block user-image" alt="Profile_Image" data-toggle="modal"
                data-target="#showImage" width="200px">
        </div>

    </div>


    <hr>

    <!-- Displaying User Information -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered user-table">
                    <tbody>
                        <tr>
                            <td>User Name:</td>
                            <td class="font-weight-bold"><?php echo $_SESSION['user']['user_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Full Name:</td>
                            <td class="text-capitalize font-weight-bold"><?php echo $_SESSION['user']['full_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td class="font-weight-bold"><?php echo $_SESSION['user']['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Contact:</td>
                            <td class="font-weight-bold"><?php echo $_SESSION['user']['contact'] ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td class="text-capitalize font-weight-bold"><?php echo $_SESSION['user']['gender'] ?></td>
                        </tr>
                        <tr>
                            <td>Birth Date:</td>
                            <td class="font-weight-bold"><?php echo $_SESSION['user']['birth_date'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default btn-sm float-right" style="border-radius: 5px;" data-toggle="modal"
                data-target="#changePassword">Change Password</button>

            <button class="btn btn-default btn-sm float-right mr-1" style="border-radius: 5px;" data-toggle="modal"
                data-target="#changeProfile">Change Profile Photo</button>

            <button class="btn btn-default btn-sm float-right mr-1" style="border-radius: 5px;" data-toggle="modal"
                data-target="#editProfile">Edit Profile</button>
        </div>
    </div>
    <br><br>
    <br><br>



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
                            alt="Profile_Image" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit picture-->
<div class="modal fade" id="changeProfile" tabindex="-1" role="dialog" aria-labelledby="changeProfile"
    aria-hidden="true">
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
                        <i class="fa fa-picture-o fa-2x float-left font-icon" style="cursor:pointer;"
                            onclick="loadFileForProfile()"></i>
                        <input type="file" name="profileImage" id="profileImage" hidden="hidden">

                        <span id="fileSelectedDisplay_ForProfile">
                            <label class="ml-1 mt-1" id="customText_ForProfile">No File</label>
                            <label class="ml-1 mt-1 font-icon" style="cursor:pointer;"
                                onclick="discardFileForProfile()">&times;</label>
                        </span>

                        <input type="button" id="profileImage_SubmitBtn" value="Update"
                            class="btn btn-primary float-right" onclick="submitProfilePicture()">

                        <script>
                        $('#fileSelectedDisplay_ForProfile').hide();
                        document.querySelector('#profileImage_SubmitBtn').disabled = true;
                        </script>
                    </div>
                </div>
            </div>

            <div class="modal-footer message" id="signinMessageBox">
                <label id="updateImageRES"></label>
            </div>
        </div>
    </div>
</div>

<!-- Modal Change Password -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="image" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="changePassword">
                    <div class="form-group">
                        <label>Enter Current Password:</label>
                        <input type="password" name="currentPassword" id="currentPassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Enter New Password:</label>
                        <input type="password" name="newPassword" id="newPassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password:</label>
                        <input type="password" name="confirmNewPassword" id="confirmNewPassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary btn-index" value="Change Password">
                    </div>
                </form>
            </div>
            <div class="modal-footer message" id="changePassowrdMessageBox">
                <label id="changePasswordRES"></label>
            </div>
        </div>
    </div>
</div>


<script>
$("form[name='changePassword']").validate({
    rules: {
        currentPassword: {
            required: true,
            minlength: 5
        },
        newPassword: {
            required: true,
            minlength: 5
        },
        confirmNewPassword: {
            equalTo: "#newPassword"
        }

    },
    messages: {
        currentPassword: {
            required: "Required",
            minlength: "Password must conatin more than 5 chars",
        },
        newPassword: {
            required: "Required",
            minlength: "Password must conatin more than 5 chars",
        },
        confirmNewPassword: {
            equalTo: "Password doesn't match to New Password"
        },
    },

    submitHandler: function(form) {

        $.ajax({
            type: "POST",
            url: "<?php echo $root ?>actions/user/changePasswordAction.php",
            data: {
                currentPassword: $('#currentPassword').val(),
                newPassword: $('#newPassword').val()
            },
            dataType: 'JSON',
            success: function(response) {
                $('#changePasswordRES').html(response.message);
                if (!response.success) {
                    $('#changePassowrdMessageBox').removeClass("success-validation");
                    $('#changePassowrdMessageBox').addClass("error-validation");
                }
                if (response.success) {
                    $('#changePassowrdMessageBox').removeClass("error-validation");
                    $('#changePassowrdMessageBox').addClass("success-validation");

                    $.confirm({
                        title: 'Please Log In!',
                        content: 'Your Password Have Been Changed Kindly Login Again To Continue',
                        buttons: {
                            confirm: function() {
                                window.location = response.url;
                            },
                        }
                    });
                }
            },
            error: function(e) {
                $('#changePasswordRES').html(e.responseText);
            }
        });

        //form.submit();
    }
});
</script>