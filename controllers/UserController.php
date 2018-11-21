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

  public function signup(User $user){
    if($user != null){
      
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
        return true;
      }

      // Print error if something goes wrong
                //return "Error: %s.\n". $stmt->error;
      return false;
      
      

    }
    else{
      return false;
    }
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

