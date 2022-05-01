<?php //defined('ROOT_PATH') OR die('Access denied');

include_once "../Bootstrap/init.php";

if(!isAjaxRequest()){
diePage("Invalid Request");
};
if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("invalid Action");
}
switch ($_POST['action']) {
    case "addFolder":
        
        if(addFolder($_POST['folder_name'])){
            return TRUE;
        };
        break;
    
    default:
    diePage("invalid Action");
        break;
}