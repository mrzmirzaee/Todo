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
                    <li class="<?= isset($_GET['folder_id'])  ? '' : 'active' ; ?> "> <i class="fa fa-folder"></i>All</li>
                        <?php  foreach($folders as $folder):?>
                                <li class="<?=(isset($_GET['folder_id']) && $_GET['folder_id'] == $folder->id) ? "active" : '' ;?>">
                                 <a href="?folder_id=<?= $folder->id?>" ><i class="fa fa-folder"></i><?= $folder->folder_name; ?></a>
                                 <a href="?delete_folder=<?= $folder->id?>" class="removeBtn" onclick="return confirm('are you sure you want to delete this item?\n <?= $folder->folder_name?>');"><i class="fa fa-trash-o"></i>
                                 </a>
                                </li>
                            
                        
                        <?php endforeach;?>
                      
                    </ul>
                    
                </div>
                <input type="text" id="addFolderInput" placeholder="Add New Folder">
                    <button id="addFolderBtn"class="btn clickable">+</button>
            </div>
            <div class="view">
                <div class="viewHeader">
                    <div class="title"> 
                          <input type="text" id="addTaskInput" placeholder="Add New Task">
                </div>
                    <div class="functions">
                        <div class="button">Completed</div>
                        <div class="button active btn clickable" id="addTaskBtn">Add New Task</div>

                 </div>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="title"style="width: 50%;">Today</div>
                        <ul><?php if(sizeof($tasks)): ?>
                            <?php  foreach ($tasks as $task):?>
                                <li  class="<?= $task->is_done ? "checked" : ""; ?>"><i data-TaskId="<?= $task->id ?>" class="<?= $task->is_done ? "fa fa-check-square-o" : "fa fa-square-o"; ?> isDone"></i><span><?= $task->title ;?></span>
                                <div class="info">
                                   <span>created_at<?=$task->created_at?></span>
                                   <a href="?delete_task=<?=$task->id?>" class="removeBtn" onclick="return confirm('are you sure you want to delete this item?\n <?= $task->title?>');"><i class="fa fa-trash-o"></i>
                                 </a>
                                </div>
                            </li>
                          
                            <?php endforeach;?>
                            <?php else : echo " <li class='checked' ><i class=''></i><span>Nothing To Show here yet Add Some Tasks  ...</span>"; 
                            endif;?>
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
    $('.isDone').click(function(e){
        var tid = $(this).attr('data-TaskId');
        $.ajax({
                url: "process/ajaxHandler.php", 
                method: "post",
                data:{action: "doneSwitch", taskId: tid }, 
                success: function (respone) {
                        location.reload();
                }
            });
    });
        $('#addFolderBtn').click(function(e){
            var inputAddFolder = $('#addFolderInput');
            $.ajax({
                url: "process/ajaxHandler.php", 
                method: "post",
                data:{action: "addFolder", folder_name: inputAddFolder.val()}, 
                success: function (respone) {
                    if(respone !== 0){
                        $('<li> <a href="#"><i class="fa fa-folder"></i>'+inputAddFolder.val()+'</a> <a href="?delete_folder= <?php echo $folder->id;?>" class="removeBtn" > <i class="fa fa-trash-o"></i> </a> </li> ').appendTo('.folder-list');
                        inputAddFolder.val("");
                        
                     }

                }
            });
        });

        $('#addTaskInput').on('keypress',function(e){
            var inputAddTask = $('#addTaskInput')
            if(e.which == 13 ){
                $.ajax({
                    url: "process/ajaxhandler.php",
                    method:"post",
                    data:{action : "addTask" ,folder_id: <?= $_GET['folder_id']?> , task_title: inputAddTask.val()},
                    success : function(respone){
                      if(respone !== 0){
                          console.log(respone)
                           location.reload() 
                      }
                    }      
                })
            }
         })
    })
    
</script>

</body>

</html>