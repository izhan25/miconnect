<?php

include '../config/Database.php';
include '../controllers/UserController.php';
include '../models/User.php';

class ViewUser extends UserController{

    public function showUsers(){

        $datas = $this->getUsers();

        foreach ($datas as $data) {
            echo $data['contact']. '<br>';
        }
    }
}

$viewUser = new ViewUser();

$viewUser->showUsers();