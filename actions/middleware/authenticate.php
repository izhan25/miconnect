<?php

if(empty($_SESSION['user'])){
    header('location: '. $root);
}