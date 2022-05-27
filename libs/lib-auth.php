<?php defined('ROOT_PATH') OR die('Access denied');
function authenticate($user,$pass){


};

function getCurrentUserId(){
    return 1;

};
function isLoggedIn(){
return false;
}
function register($userdata){
    global $db;
    $pass = $userdata['password'];
    $sql = "INSERT INTO users (`name`,`email`,`password`) values (:name,:email,:password)";
    $stmt = $db->prepare($sql);
    $stmt->execute([':name'=>$userdata['name'],':email'=>$userdata['email'] , ':password' => $pass ]);
    return $stmt->rowCount() ? true : false ; 
}
function login($email, $pass){
    global $db;
    $sql = "INSERT INTO users (`name`,`email`,`password`) values (:name,:email,:password)";
    $stmt = $db->prepare($sql);
<<<<<<< HEAD
    $stmt->execute(["email"=> $email , "password" => $pass ]);
=======
    $stmt->execute(["name"=>"$name","email"=> $email , "password" => $pass ]);
>>>>>>> fc31472979ac8487229afde10d7d4f33f899cf93
}