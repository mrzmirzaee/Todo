<?php defined('ROOT_PATH') OR die('Access denied');
function diePage($msg){
    echo "$msg";
    die();
};
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
       return true;    
    }
}
function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}