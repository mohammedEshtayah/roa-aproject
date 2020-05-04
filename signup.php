<?php
 
include_once './database.php';
 include_once './Users.php';
 $database = new Database();
 
 $db = $database->getConnection();
  
 $user = new User($db);
 $user->username = $_POST['username'];
 $user->password = $_POST['password'];
 $user->email = $_POST['email'];
  
 
 if($user->signup()){
     $user_arr=array(
         "status" => true,
         "message" => "Successfully Signup!", 
         "username" => $user->username
     );
 }
 else{
     $user_arr=array(
         "status" => false,
         "message" => "Username already exists!"
     );
 }
echo json_encode($user_arr);
// return json_encode($user_arr, true);
//  print_r(json_encode($user_arr));
 
 ?>