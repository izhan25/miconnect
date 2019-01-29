<?php
    include '../../actions/middleware/app.php'; 
    include '../../actions/middleware/authenticate.php';
    
?>
<div id="findFriends">

    <!-- Search Box -->
    <div class="row mt-5">
        <div class="col-md-12">

            <form>
                <div class="form-group">
                    <input type="text" name="search" class="form-control" id="search"
                        placeholder="Enter Any Name Here..." onkeyup="searchFriend()" autofocus>
                </div>
                <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary float-right">
                </div>
            </form>

        </div>
    </div>

    <div id="viewFriends">
    </div>

    <script>
    loadUsers();
    </script>



</div>