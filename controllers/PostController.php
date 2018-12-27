<?php

class PostController extends Database{

    public function getPosts(){
  
      $query = 'select * from posts ORDER BY created_at DESC';
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
  
    public function deletePost($postId, $image){

      $message = '';
      
      $query = 'DELETE FROM posts WHERE id = :postId';

      // Preparing Statement
      $stmt = $this->connect()->prepare($query);

      // binding Paramaters
      $stmt->bindParam(':postId', $postId);

      // Executing Statement
      if($stmt->execute()){
        
        error_reporting(0);
        try{
          $file_to_delete = '../../include/images/posts/' . $image;
          unlink($file_to_delete);
        }
        catch(Exception $ex){
          $message = 'Image Not found<br>';
        }

        $message .= 'Post Deleted';
        return $message;
      }

      // Print error if something goes wrong
      $message = "Error: %s.\n". $stmt->error;
      return $message;

    }

    public function unlike_Post_if_Liked($postId, $userId){

      $query = 'SELECT * FROM likes 
                WHERE
                  post_id = :postId
                  AND
                  user_id = :userId';
      
      // Preparing Statement
      $stmt = $this->connect()->prepare($query);

      // binding Paramaters
      $stmt->bindParam(':userId', $userId);
      $stmt->bindParam(':postId', $postId);

      // executing the statement
      $stmt->execute();

      // fetching row
      $row = $stmt->fetch();

      if(!empty($row)){
        // post is already liked by user
        return true;
      }
      else{
        // post is not liked by the user
        return false;
      }

    }

    public function unlikePost($postId, $userId){

      $query = 'DELETE FROM likes
                WHERE
                  post_id = :postId
                  AND 
                  user_id = :userId';

      // Preparing Statement
      $stmt = $this->connect()->prepare($query);

      // binding Paramaters
      $stmt->bindParam(':userId', $userId);
      $stmt->bindParam(':postId', $postId);

      // Executing Statement
      if($stmt->execute()){
        return true;
      }

      return false;
    }

    public function likePost($postId, $userId){

      // Checking Is Post Is Liked By the Logged In User Or Not
      $liked = $this->unlike_Post_if_Liked($postId, $userId);

      if($liked){

        // unliking post
        $unliked = $this->unlikePost($postId, $userId);

        if($unliked){
          return false;
        }
        else{
          return 'Error in unliking the post';
        }

      }

      // Liking the post
      $query = 'INSERT INTO likes 
                SET
                  user_id = :userId, 
                  post_id = :postId';

      // Preparing Statement
      $stmt = $this->connect()->prepare($query);

      // binding Paramaters
      $stmt->bindParam(':userId', $userId);
      $stmt->bindParam(':postId', $postId);

      // Executing Statement
      if($stmt->execute()){
        return true;
      }

      return false;

    }

    public function get_Likes_Count($postId){

      $query = 'SELECT COUNT(user_id)
                FROM likes
                WHERE post_id = :postId';

      // Preparing Statement
      $stmt = $this->connect()->prepare($query);

      // binding Paramaters
      $stmt->bindParam(':postId', $postId);


      // executing statement
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }



  }
  