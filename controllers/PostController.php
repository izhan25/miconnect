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

    public function createPost($body, $image , $userId){

      $query = 'insert into posts set 
                body = :body,
                image = :image,
                user_id = :userId';

      // preparing statement
      $stmt = $this->connect()->prepare($query);

      // binding data
      $stmt->bindParam(':body', $body);
      $stmt->bindParam(':image', $image);
      $stmt->bindParam(':userId', $userId);

      // Execute query
      if($stmt->execute()) {
        $message = 'Successfully Posted';
        return $message;
      }

      // Print error if something goes wrong
      $message = "Error: %s.\n". $stmt->error;
      return $message;
                
    }
  
  }
  