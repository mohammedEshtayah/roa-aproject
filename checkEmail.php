<?php 
// include_once './config.php';
include_once './database.php';
include_once './Users.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->email = isset($_GET['email']) ? $_GET['email'] : die(); 
 
$stmt = $user->checkEmail();
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