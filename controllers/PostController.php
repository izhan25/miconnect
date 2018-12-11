<?php

class PostController extends Database{

    public function getPosts(){
  
      $query = 'select * from posts';
      $result = $this->connect()->query($query);
      $num = $result->rowCount();
      if($num > 0 ){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          $data[] = $row;
        }
        return $data;
      } 
      else{
        return 'No Posts Found';
      }
    }
  
  }
  