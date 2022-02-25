<?php
include "./Bootstrap/init.php";
if (isset($_GET['delete_folder'])&& is_numeric($_GET['delete_folder']) ){
    deleteFolder($_GET['delete_folder']);
};
if (isset($_GET['folder_name'])) {
    addFolder($_GET['folder_name']);
    
}

$folders = getFolders();
// var_dump($folders);
// $tasks = getTasks();
// dd($tasks);
$tasks = getTasks();
include "./Views/tpl-index.php";