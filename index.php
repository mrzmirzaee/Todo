<?php
// ********Loads every required File*********
include "./Bootstrap/init.php";
// ******** Check if User is Logged in *********
if (!isLoggedIn()){
header("location:".site_url('auth.php'));
};
// ********Deletes folders by sent parameters*********
if (isset($_GET['delete_folder'])&& is_numeric($_GET['delete_folder']) ){
    deleteFolder($_GET['delete_folder']);
};
// ********Adds folders by sent parameters*********
if (isset($_GET['folder_name'])) {
    addFolder($_GET['folder_name']);
    
}
// ********Deletes Tasks by sent parameters*********
if (isset($_GET['delete_task'])&& is_numeric($_GET['delete_task']) ){
    deleteTask($_GET['delete_task']);
};
// ********Gets folders*********
$folders = getFolders();
// ********Gets Tasks*********
$tasks = getTasks();

// ********Renders layout*********
include "./Views/tpl-index.php";