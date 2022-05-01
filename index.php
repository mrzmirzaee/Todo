<?php
// ********Loads every required File*********
include "./Bootstrap/init.php";
// ********Deletes folders by sent parameters*********
if (isset($_GET['delete_folder'])&& is_numeric($_GET['delete_folder']) ){
    deleteFolder($_GET['delete_folder']);
};
// ********Adds folders by sent parameters*********
if (isset($_GET['folder_name'])) {
    addFolder($_GET['folder_name']);
    
}
// ********Deletes Tasks by sent parameters*********
if (isset($_GET['delete_task'])&& is_numeric($_GET['delete-task']) ){
    deleteTask($_GET['delete-task']);
};
// ********Gets folders*********
$folders = getFolders();
// ********Gets Tasks*********
$tasks = getTasks();
// ********Renders layout*********
include "./Views/tpl-index.php";