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
        case "doneSwitch":
            if(doneSwitch($_POST['taskId'])){
                return TRUE;
            };
    case "addTask":
        if(addTask($_POST['folder_id'], $_POST['task_title'])){
            return true;
        }
        break;
    default:
    diePage("invalid Action");
        break;
}