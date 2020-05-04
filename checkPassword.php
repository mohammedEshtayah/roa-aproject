<?php 
// include_once './config.php';
include_once './database.php';
include_once './Users.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->username = isset($_GET['username']) ? $_GET['username'] : die(); 
$user->password = isset($_GET['password']) ? $_GET['password'] : die(); 
 
$stmt = $user->checkPassword();
if($stmt==true){ 
     
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!", 
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
} 
echo json_encode($user_arr,JSON_UNESCAPED_UNICODE );

// return json_encode($user_arr, true);
// print_r(json_encode($user_arr));

?>