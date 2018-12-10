<div id="newsFeed">
    <!-- Create New Post -->
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Create a new post to share with your friends"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Post" class="btn btn-primary float-right">
                </div>
            </form>
        </div>
    </div>

    <!-- Posts -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="./include/images/default_User.png" class="img-fluid img-thumbnail user-post-image">
                        </div>
                        <div class="col-xs-7">
                            <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2"><?php echo $_SESSION['user']['full_name'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <i class="fa fa-thumbs-o-up side-nav-option list-icons" aria-hidden="true"></i>
                    <i class="fa fa-pencil-square-o ml-3 side-nav-option list-icons" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="./include/images/default_User.png" class="img-fluid img-thumbnail user-post-image">
                        </div>
                        <div class="col-xs-7">
                            <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2"><?php echo $_SESSION['user']['full_name'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <i class="fa fa-thumbs-o-up side-nav-option list-icons" aria-hidden="true"></i>
                    <i class="fa fa-pencil-square-o ml-3 side-nav-option list-icons" aria-hidden="true"></i>
                </div>
            </div>
            <br><br><br>
        </div>
    </div>
</div>