<!--Mobile Navbar-->
<div class=" d-block d-xs-block d-sm-block d-md-none d-lg-none">
    <div class="d-flex flex-row list-icons justify-content-center fixed-bottom mob-nav">
        <div class="p-2 ml-3">
            <span><i class="fa fa-search friendsBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3">
            <span><i class="fa fa-newspaper-o feedBtn" aria-hidden="true"></i></span>
        </div>
        <div class="p-2 ml-3">
            <span><i class="fa fa-users RequestBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3">
            <span><i class="fa fa-user ProflileBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3">
            <span><i class="fa fa-picture-o AlbumBtn" aria-hidden="true" ></i></span>
        </div>
    </div>
</div>


<div class="row">
    <!-- Main Content -->
    <div class="col-md-8">

        <div ng-view></div>

        <?php
            //include './views/components/_newsFeed.php';
            //include './views/components/_findFriends.php';
            //include './views/components/_requests.php';
            //include './views/components/_profile.php';
            //include './views/components/_album.php';
         ?>
    </div>

    <!--Desktop Navbar-->
    <div class="col-md-4 ">
        <div class="d-none d-xs-none d-sm-none d-md-block d-lg-block">
            <ul class="list-group list-group-flush">
                <li class="list-group-item side-nav-option selected">
                    <a href="#!feed">
                        <i class="fa fa-newspaper-o mr-1" aria-hidden="true"></i>
                        <label class="feedBtn">News Feed</label>
                    </a>
                    
                </li>
                <li class="list-group-item side-nav-option">
                    <i class="fa fa-search mr-1" aria-hidden="true"></i>
                    <label class="friendsBtn">Find Friends</label>
                </li>
                <li class="list-group-item side-nav-option">
                    <i class="fa fa-users mr-1" aria-hidden="true"></i>
                    <label class="RequestBtn">Requests</label>
                </li>
                <li class="list-group-item side-nav-option">
                    <i class="fa fa-user mr-1" aria-hidden="true"></i>
                    <label class="ProflileBtn">Profile</label>
                </li>
                <li class="list-group-item side-nav-option">
                    <i class="fa fa-picture-o mr-1" aria-hidden="true"></i>
                    <label class="AlbumBtn">Photo Album</label>
                </li>
            </ul>
        </div>
    </div>
</div>

