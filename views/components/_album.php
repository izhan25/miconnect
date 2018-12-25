<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';
?>

<div id="album">
   
   <div class="row">
       <div class="col-xs-5">
            <div class="text-center">
                <i class="fa fa-camera fa-3x" aria-hidden="true"></i>
                <br>
                <b>Uplaod New Photo</b>
            </div>
       </div>
       <div class="col-xs-5">
            <div class="text-center">
                <i class="fa fa-instagram fa-3x"></i>
                <br>
                <b>Preview in Gallery</b>
            </div>
       </div>
   </div>

   <div class="row mt-2">
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo1.jpg" class="img-fluid img-thumbnail img-album">
        </div>
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo2.jpg" class="img-fluid img-thumbnail img-album">
        </div>
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo3.jpg" class="img-fluid img-thumbnail img-album">
        </div>
   </div>
   <div class="row mt-2">
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo3.jpg" class="img-fluid img-thumbnail img-album">
        </div>
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo1.jpg" class="img-fluid img-thumbnail img-album">
        </div>
        <div class="col-md-4">
            <img src="<?php echo $root ?>include/images/albums/photo2.jpg" class="img-fluid img-thumbnail img-album">
        </div>
   </div>
</div> 


<!-- BootstrapJs-->
<script src="../include/bootstrap/js/bootstrap.min.js"> </script>

<script>
    $('.img-album').click(function(e){
        var imgURL = e.currentTarget.attributes[0].nodeValue;
        $('#img-album-preview').attr('src', imgURL);
        $('#showImage').modal('show');
    });
</script>
