<?php

include '../middleware/app.php';

session_destroy();

header('location: '. $home);