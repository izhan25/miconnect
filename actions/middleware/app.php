<?php

// starting session
session_start();


// ========= Routes ========== 

// global url
$root = 'http://localhost/MiConnect/';

// home
$home = $root . 'home.php';

// auth
$auth = $root . 'actions/middleware/authenticate.php';

// profile
$profile = $root . 'views/profile.php';

//$array = array('root'=> $root, 'home' => $home, 'auth' => $auth);
