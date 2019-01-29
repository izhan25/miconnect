<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

    <h5 class="ml-2 my-0 mr-md-auto font-weight-bold text-primary" style="font-size: 30px;">
        <a href="/MiConnect/" class="nav-link" style="padding: 5px 5px;">MiConnect</a>
    </h5>

    <?php if(!empty($_SESSION['user'])): ?>
    <div class="d-none d-sm-block">
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark feedBtn" href="#">Home</a>
            <a class="p-2 text-dark ProflileBtn" href="#">Profile</a>
            <a class="btn btn-danger btn-sm" href="#" onclick="logout()">Logout</a>
        </nav>
    </div>
    <?php endif ?>

</div>