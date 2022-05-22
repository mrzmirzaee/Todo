<?php
include_once "./Bootstrap/init.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $params = $_POST;
        if($action == 'register'){
            $result = register($params);
            if($result == false){message('an Error in resgistration');}
        }elseif($action == 'login'){
            $result = login($params['email'],$params['password']);
        }
}
include_once "./Views/tpl-auth.php";