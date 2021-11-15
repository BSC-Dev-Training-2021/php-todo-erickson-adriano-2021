<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//get settings

$sql2 = "SELECT * FROM settings";
$res = mysqli_query($conn,$sql2);
while($row2 = mysqli_fetch_array($res))
$results_per_page = $row2['results_per_page'];//in setting create a update


 $sql = "SELECT * FROM completed";
$result = mysqli_query($conn,$sql);
$number_of_result = mysqli_num_rows($result);



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>To Do List - Completed</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
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
            </div>
            <div class="row">
                <header class="mt-5 ml-3">
                    <h2>
                        Completed Tasks
                        <?php 
                       
                            include 'handler.php';
                            $sql = "SELECT COUNT(*) FROM completed ";
                            $res = $db->query($sql);
                            $count = $res->fetchColumn();
                              
                        ?>
                        <span class="badge badge-pill badge-info"><?php print $count;?></span>
                    
                    </h2>
                </header>
                <div class="col-lg-12 mt-5">
                    <!-- Tasks section-->
                    <section>
                        <ul class="list-group list-group-flush">
                            <?php // 
                               $number_of_page = ceil($number_of_result/$results_per_page);
                            if (!isset($_GET['page'])) {
                              $page = 1;
                            } else {
                              $page = $_GET['page'];
                            }
                            $this_page_first_result = ($page-1)*$results_per_page;

                            $sql='SELECT * FROM completed ORDER BY complete_id DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_array($result)) :   

                            
                        ?>

                            <li class="list-group-item"><?php echo  $row['completed_todo']; ?></li>
                        <?php endwhile;?>
                           
                        </ul>
                    </section>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <?php
                             


                                for ($page=1;$page<=$number_of_page;$page++):

                                ?>


                            <li class="page-item "><a class="page-link" href=<?php echo '"completed.php?page='. $page .'"' ?>> <?php echo $page; ?></a></li>
                            <?php endfor;?>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>