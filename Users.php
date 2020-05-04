<?php
class User{
  
    private $conn;
    private $table_name = "users";
  
    
    public $username;
    public $password;
    public $email;
  
    public function __construct($db){
        $this->conn = $db;
    } 
    function signup(){ 
        if($this->isAlreadyExist()){
            return false;
        }
        $query = "INSERT INTO  " . $this->table_name . "  SET  username=:username, password=:password, email=:email";
        $stmt = $this->conn->prepare($query);
       
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
         
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        // execute query
        if($stmt->execute()){
            // $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
        
        
    }
  
    function login(){ 
        $query = "SELECT  `username`, `password`, `email` FROM " . $this->table_name . " 
        WHERE  username='".$this->username."' AND password='".$this->password."'";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }
     
    function checkEmail(){
        $query = "SELECT * FROM  " . $this->table_name . " WHERE email='".$this->email."'";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function checkPassword(){
        $query = "SELECT * FROM  " . $this->table_name . " WHERE email='".$this->email."'";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}

?>