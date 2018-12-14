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

  public function getUser($user_id){

    $query = "select * from users where user_id = ". $user_id ;
    $result = $this->connect()->query($query);
    $num = $result->rowCount();
    if($num > 0 ){
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
      }
      return $data;
    } 
    else{
      return 'No User Found';
    }
  }

  public function validateEmail($email){

    // query
    $query = 'select email from users
              where 
              email = :email';
    
    // preparing statement
    $stmt = $this->connect()->prepare($query);

    // binding parameters
    $stmt->bindParam(':email', $email);

    // executing the statement
    $stmt->execute();

    // fetching row
    $row = $stmt->fetch();

    if(!empty($row)){
      // if email already exist
      return true;
    }
    else{
      // if email is unique
      return false;
    }

  }

  public function validateUserName($user_name){

    // query
    $query = 'select user_name from users
              where 
              user_name = :user_name';
    
    // preparing statement
    $stmt = $this->connect()->prepare($query);

    // binding parameters
    $stmt->bindParam(':user_name', $user_name);

    // executing the statement
    $stmt->execute();
    
    // fetching row
    $row = $stmt->fetch();

    if(!empty($row)){
      // if user name already exist
      return true;
    }
    else{
      // if user name is unique
      return false;
    }

  }

  public function signup(User $user){

    // validation for email and user name
    $validate_message = '';
    if($this->validateEmail($user->email)){
      $validate_message = 'Email ';
    }
    if($this->validateUserName($user->user_name)){
      $validate_message .= ' User Name';
    }
    if(!empty($validate_message)){
      $validate_message .= ' already exist.';
      return $validate_message;
    }

    $query = 'insert into users set 
              user_name = :user_name,
              full_name = :full_name,
              email = :email,
              contact = :contact,
              password = :password,
              gender = :gender,
              birth_date = :birth_date,
              image = :image ';
      
    // preparing statement
    $stmt = $this->connect()->prepare($query);

    // encrypting password
    $pwd_enc = md5($user->password);
    
    // binding data
    $stmt->bindParam(':user_name', $user->user_name);
    $stmt->bindParam(':full_name', $user->full_name);
    $stmt->bindParam(':email', $user->email);
    $stmt->bindParam(':contact', $user->contact);
    $stmt->bindParam(':password', $pwd_enc);
    $stmt->bindParam(':gender', $user->gender);
    $stmt->bindParam(':birth_date', $user->birth_date);
    $stmt->bindParam(':image', $user->image);

    // Execute query
    if($stmt->execute()) {
      $message = 'You Have Successfully Signed Up';
      return $message;
    }

    // Print error if something goes wrong
    $message = "Error: %s.\n". $stmt->error;
    return $message;
    
  }

  public function signin(User $user){
    $query = 'select * from users 
              where 
              user_name = :user_name
              and
              password = :password';

    // preparing statement
    $stmt = $this->connect()->prepare($query);

    // encrypting password
    $pwd_enc = md5($user->password);

    // binding parameters
    $stmt->bindParam(':user_name', $user->user_name);
    $stmt->bindParam(':password', $pwd_enc);

  
    // Execute query
    if($stmt->execute()) {
      return $stmt;
    }

    return false;
  }

  public function getFriends($id){
    $query = 'select * from friends where user_id = '. $id;
    $result = $this->connect()->query($query);
    $num = $result->rowCount();
    if($num > 0 ){
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
      }
      return $data;
    } 
    else{
      return 'No Friends Found';
    }
  }

  public function sendRequest($id, $sender){

      $query = 'insert into requests 
                set 
                user_id = :sender, 
                req_id = :userid';

      // preparing statement
      $stmt = $this->connect()->prepare($query);

      // binding parameters
      $stmt->bindParam(':userid', $id);
      $stmt->bindParam(':sender', $sender);

      // Execute query
      if($stmt->execute()) {
        $message = 'sent';
        return $message;
      }

      // Print error if something goes wrong
      $message = "Error: %s.\n". $stmt->error;
      return $message;
  }

  public function getRequests($id){
    $query = 'select * from requests where user_id = '. $id;
    $result = $this->connect()->query($query);
    $num = $result->rowCount();
    if($num > 0 ){
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
      }
      return $data;
    } 
    else{
      return 'No Requests Found';
    }
  }

  public function changePassword($newPassword, $id){

    $query = 'update users
              set 
                password = :newPassword
              where 
                id = :id';

    // preparing statement
    $stmt = $this->connect()->prepare($query);

    // encrypting password
    $pwd_enc = md5($newPassword);

    // binding parameters
    $stmt->bindParam(':newPassword', $pwd_enc);
    $stmt->bindParam(':id', $id);

    // Execute query
    if($stmt->execute()) {
      $message = 'Password Changed';
      return $message;
    }

    // Print error if something goes wrong
    $message = "Error: %s.\n". $stmt->error;
    return $message;
  }

}

