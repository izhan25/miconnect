<?php 

class UserController extends Database{

    public function getUsers(){

      $query = 'select * from users';

      $result = $this->connect()->query($query);

      $num = $result->rowCount();

      if($num > 0 ){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          $data[] = $row;
        }
        return $data;
      } 
      else{
        return 'No Users Found';
      }

    }

    public function insertUser(){
      
    }
}

