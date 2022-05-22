<?php   defined('ROOT_PATH') OR die('Access denied');
function getFolders(){
    global $db;
    $currentUserId = getCurrentUserId();
    $sql = "select * from folders where user_id = $currentUserId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
    };
function deleteFolder($folder_id){
        global $db;
        $deleteFolder = "delete from folders where id = $folder_id";
        $stmt = $db->prepare($deleteFolder);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;    

    };

function addFolder($folder_name)
{
    global $db;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO folders (`folder_name`,`user_id`) values (:folder_name,:user_id)";
    $stmt = $db->prepare($sql);
    $stmt->execute(["folder_name"=>"$folder_name","user_id"=> $current_user_id]);

}
function getTasks(){
    global $db;
    $folderSort = '';
    if(isset($_GET['folder_id']))
    {   $folder =  $_GET['folder_id'];
        $folderSort = " and folder_id = $folder";
    }
    $currentUserId = getCurrentUserId();
    $sql = "select * from tasks where user_id = $currentUserId $folderSort ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
    }

    function deleteTask($taskId){
        global $db;
        $deleteTask = "delete from tasks where id = $taskId";
        $stmt = $db->prepare($deleteTask);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;    

    };
    function addTask($folder_id,$task_title)
{
    global $db;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO tasks (`title`,`folder_id`,`user_id`) values (:title,:folder_id,:user_id)";
    $stmt = $db->prepare($sql);
    $stmt->execute(["title"=>"$task_title", "folder_id"=>$folder_id, "user_id"=> $current_user_id]);

}
function doneSwitch($task_id)
{
    global $db;
    $current_user_id = getCurrentUserId();
    $sql = "UPDATE  `tasks` set is_done =  1 - is_done where user_id = :current_user_id and id = :task_id";
    $stmt = $db->prepare($sql);
    $stmt->execute([":current_user_id"=> $current_user_id  , ":task_id"=> $task_id]);

}