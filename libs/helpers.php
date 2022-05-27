<?php defined('ROOT_PATH') OR die('Access denied');
function diePage($msg){
    echo "$msg";
    die();
};
<<<<<<< HEAD
function message($msg){
=======
function Page($msg){
>>>>>>> fc31472979ac8487229afde10d7d4f33f899cf93
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