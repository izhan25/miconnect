<?php 

include './config/Database.php';

$test = true;

if($test){
    $validate_message = 'Email ';
}
if($test){
    $validate_message .= ' User Name';
}
if(!empty($validate_message)){
    $validate_message .= ' already exist.';
    echo $validate_message;
}

