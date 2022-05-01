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
    $currentUserId = getCurrentUserId();
    $sql = "select * from tasks where user_id = $currentUserId ";
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