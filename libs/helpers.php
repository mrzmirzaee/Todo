<?php defined('ROOT_PATH') OR die('Access denied');
function diePage($msg){
    echo "$msg";
    die();
};
function message($msg){
    echo "$msg";
    
};
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
       return true;    
    }
}

function site_url($uri = ''){
return BASE_URL . $uri;
};