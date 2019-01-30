<?php 
  class Database {
    // DB Params
    private $host = 'den1.mysql1.gear.host';
    private $db_name = 'miconnect';
    private $username = 'miconnect';
    private $password = 'Bg5e~V_qNBh8';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;
      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
      return $this->conn;
    }
  }