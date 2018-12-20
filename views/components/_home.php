<!--Mobile Navbar-->
<div class=" d-block d-xs-block d-sm-block d-md-none d-lg-none fixed-bottom">
    <div class="d-flex flex-row list-icons justify-content-center mob-nav">
        <div class="p-2 ml-3 option-friends">
            <span><i class="fa fa-search friendsBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3 option-request">
            <span><i class="fa fa-users RequestBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3 option-feed selected">
            <span><i class="fa fa-newspaper-o feedBtn" aria-hidden="true"></i></span>
        </div>
        <div class="p-2 ml-3 option-profile">
            <span><i class="fa fa-user ProflileBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3 option-album">
            <span><i class="fa fa-picture-o AlbumBtn" aria-hidden="true" ></i></span>
        </div>
        <div class="p-2 ml-3">
            <span><i class="fa fa-power-off" aria-hidden="true" onclick="logout()"></i></span>
        </div>
    </div>
</div>


<div class="row">
    <!-- Main Content -->
    <div class="col-md-8">
        <div id="view"></div>
    </div>

    <!--Desktop Navbar-->
    <div class="col-md-4 ">
        <div class="d-none d-xs-none d-sm-none d-md-block d-lg-block">
            <ul class="list-group list-group-flush">
                <li class="list-group-item side-nav-option option-feed selected">
                    <i class="fa fa-newspaper-o mr-1" aria-hidden="true"></i>
                    <label class="feedBtn">News Feed</label>
                </li>
                <li class="list-group-item side-nav-option option-friends">
                    <i class="fa fa-search mr-1" aria-hidden="true"></i>
                    <label class="friendsBtn">Find Friends</label>
                </li>
                <li class="list-group-item side-nav-option option-request">
                    <i class="fa fa-users mr-1" aria-hidden="true"></i>
                    <label class="RequestBtn">Requests</label>
                </li>
                <li class="list-group-item side-nav-option option-profile">
                    <i class="fa fa-user mr-1" aria-hidden="true"></i>
                    <label class="ProflileBtn">Profile</label>
                </li>
                <li class="list-group-item side-nav-option option-album">
                    <i class="fa fa-picture-o mr-1" aria-hidden="true"></i>
                    <label class="AlbumBtn">Photo Album</label>
                </li>
            </ul>
        </div>
    </div>
</div>

