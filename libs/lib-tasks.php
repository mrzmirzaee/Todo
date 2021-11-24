<?php 
function getTasks(){


};

function getFolders(){
    global $db;
    $currentUser = getCurrentUserId();
    $sql = "select * from folders where user_id = $currentUser ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
    };

    function deleteFolder($folder_id){
        global $db;
        $sql = "delete from folders where id = $folder_id ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;
    };