<?php
include "./Bootstrap/init.php";
if (isset($_GET['delete_folder'])&& is_numeric($_GET['delete_folder']) ){
    deleteFolder($_GET['delete_folder']);
};


$folders = getFolders();
// var_dump($folders);
include "./Views/tpl-index.php";