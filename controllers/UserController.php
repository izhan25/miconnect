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

}

