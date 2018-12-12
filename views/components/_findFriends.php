
<div id="findFriends">
    
    <!-- Search Box -->
    <div class="row mt-5">
        <div class="col-md-12">
            
            <form>
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Enter Any Name Here..." autofocus>
                </div>
                <div class="form-group">
                  <input type="submit"  value="Search" class="btn btn-primary float-right">
                </div>
            </form>
                
        </div>
    </div>

    <!-- Searched Content -->
    <div class="row mt-4">
        <div class="col-md-12">
        <?php foreach($notFriends as $user): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="../include/images/<?php echo $user['image'] ?>" class="img-fluid img-thumbnail user-post-image ml-3">
                        </div>
                        <div class="col-xs-7">
                            <label class="text-capitalize font-weight-bold ml-2 p-2 mt-2"><?php echo $user['full_name'] ?></label>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <button 
                                class="btn btn-primary btn-sm float-right text-capitalize" 
                                id="<?php echo $user['id'] ?>" 
                                onclick="sendRequest('<?php echo $user['id'] ?>')"
                            >
                                Send Request
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php endforeach ?>
        </div>
    </div>

</div>

<script>
    function sendRequest(name){
        $.ajax({
            type: "GET",
            url: "/MiConnect/actions/user/sendRequestAction.php",
            data: {
                user_id : name
            },
            dataType:'JSON', 
            success: function(response){
                var btn = $('#'+response.requested);
                btn.html(response.message);
                btn.removeClass('btn-primary');
                btn.addClass('btn-default');
            },
            error: function(e){
                console.log(e.responseText);
            }
        });
    }
</script>