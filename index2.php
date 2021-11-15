<?php
include 'handler.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>To Do List</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">To Do</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="completed.php">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> 
                    <form action="create_todo_action.php" method="post"><!-- creating  todo list to data base-->
                    <div class="input-group input-group-lg mt-5">
                       
                        <input type="text" class="form-control" name="todo" aria-label="Text input with segmented dropdown button">
                        <input type="hidden" name="page" value="index2">
                        <div class="input-group-append">
                            <button type="submit" name="create_todo" class="btn btn-primary">Create Todo</button>
                        </div>
                    </div> 
                </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <!-- Tasks section-->
                    <section>
                      <ul class="list-group list-group-flush">

                        <?php
                            $query ="select * from todo LIMIT 6,10 ";
                              $d = $db->query($query);
                              foreach ($d as $data):
                                $todoList = $data['todo_list'];
                                $toDoId= $data['todo_id'];
                             

                        ?>
                             <li class="list-group-item">
                                <?php echo $todoList; ?>
                                <?php echo $toDoId; ?>

                                
                                <button type="button"   class="btn btn-light fa fa-trash-o float-right ml-1" data-toggle="modal" data-target="#deleteConfirmModal"></button>
                               
                                <button type="button" class="btn btn-light fa fa-check float-right"></button>
                            </li>
                        <?php endforeach;?>
                        </ul>
                   
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item "><a class="page-link" href="index.php">1</a></li>
                            <li class="page-item active"><a class="page-link" href="index2.php">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <section>
                <div class="modal" id="deleteConfirmModal" tabindex="-1" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Task?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this task?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <form action="delete_todo.php" method="post"><!-- delete list-->
                                    <input type="hidden" name="todo_list" value=<?php echo '"'. $_SESSION['todo'] . '"'; ?>>
                                    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>