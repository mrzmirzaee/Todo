<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Task manager UI</title>
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="page">
        <div class="pageHeader">
            <div class="title">Dashboard</div>
            <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="" width="40" height="40" /></div>
        </div>
        <div class="main">
            <div class="nav">
                <div class="searchbox">
                    <div><i class="fa fa-search"></i>
                        <input type="search" placeholder="Search" />
                    </div>
                </div>
                <div class="menu">
                    <div class="title">Navigation</div>
                    <ul class="folder-list">
                        <?php foreach($folders as $folder):?>
                                <li>
                                 <a href="?folder_id=<?= $folder->id?>"><i class="fa fa-folder"></i><?= $folder->folder_name; ?></a>
                                 <a href="?delete_folder=<?= $folder->id?>" class="removeBtn"><i class="fa fa-trash-o"></i>
                                 </a>
                                </li>
                            
                        
                        <?php endforeach;?>
                        <li class="active"> <i class="fa fa-folder"></i>Folder 2</li>
                    </ul>
                    
                </div>
                <input type="text" id="addFolderInput" placeholder="Add New Folder">
                    <button id="addFolderBtn"class="btn clickable">+</button>
            </div>
            <div class="view">
                <div class="viewHeader">
                    <div class="title">Manage Tasks</div>
                    <div class="functions">
                        <div class="button active">Add New Task</div>
                        <div class="button">Completed</div>
                        <div class="button inverz"><i class="fa fa-trash-o"></i></div>
                    </div>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="title">Today</div>
                        <ul>
                            <li class="checked"><i class="fa fa-check-square-o"></i><span>Update team page</span>
                                <div class="info">
                                    <div class="button green">In progress</div><span>Complete by 25/04/2014</span>
                                </div>
                            </li>
                            <li><i class="fa fa-square-o"></i><span>Design a new logo</span>
                                <div class="info">
                                    <div class="button">Pending</div><span>Complete by 10/04/2014</span>
                                </div>
                            </li>
                            <li><i class="fa fa-square-o"></i><span>Find a front end developer</span>
                                <div class="info"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="list">
                        <div class="title">Tomorrow</div>
                        <ul>
                            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
                                <div class="info"></div>
                            </li>
                        </ul>
                    </div>
              </div>
            </div>  
        </div>
    </div>
    <!-- partial -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
      <script src="./assets/js/script.js"></script>
    <script>
  $(document).ready(function(){
        $('#addFolderBtn').click(function(e){
            var inputAddFolder = $('#addFolderInput');
            $.ajax({
                url: "process/ajaxHandler.php", 
                method: "post",
                data:{action: "addFolder", folder_name: inputAddFolder.val()}, 
                success: function (respone) {
                     if(respone !== 0){
                        $('<li> <a href="#"><i class="fa fa-folder"></i>'+inputAddFolder.val()+'</a> <a href="?delete_folder=" class="removeBtn"><i class="fa fa-trash-o"></i> </a> </li>').appendTo('.folder-list');
                        inputAddFolder.val("");
                        
                     }
                }
            });
        });
    })
    
      </script>

</body>

</html>