<?php

    ob_start();

    session_start();

    $pageTitle = "Comments";

    if (isset($_SESSION['Username'])) {
        

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        // start Manage Page

        if($do == 'Manage') {

            $stmt = $con->prepare(
                            "SELECT 
                                comments.*, items.Name as iname, users.Username as uname
                            FROM 
                                comments
                            INNER JOIN
                                items
                            ON
                                items.Item_ID = comments.item_id
                            INNER JOIN
                                users
                            ON
                                users.UserID = comments.user_id");
            
            $stmt->execute();

            $rows = $stmt->fetchAll();
            
        ?>

            <h1 class="text-center">Manage Comments</h1>
            <div class="container">
                <div class="table-responsive">
                    <table class="main-table table table-bordered">
                    
                    <tr>

                        <td>ID</td>
                        <td>Comment</td>
                        <td>Item ID</td>
                        <td>Item Name</td>
                        <td>User ID</td>
                        <td>User Name</td>
                        <td>Added Date</td>
                        <td>Control</td>

                    </tr>

                    <?php 
                    
                        foreach($rows as $row) {
                            echo "<tr>";
                                echo "<td>" . $row['c_id']    .  "</td>";
                                echo "<td>" . $row['comment']  .  "</td>";
                                echo "<td>" . $row['item_id']     .  "</td>";
                                echo "<td>" . $row['iname']     .  "</td>";
                                echo "<td>" . $row['user_id']  .  "</td>";
                                echo "<td>" . $row['uname']  .  "</td>";
                                echo "<td>" . $row['comment_date']      .  "</td>";
                                echo "
                                    <td> 
                                        <a href='comments.php?do=Edit&comid=" . $row['c_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i>Edit </a>
                                        <a href='comments.php?do=Delete&comid=" . $row['c_id'] . "' class='btn btn-danger'><i class='fa fa-close'></i>Delete </a>";
                                    
                                        if ($row['status'] == 0 ) {
                                            echo "<a href='comments.php?do=Approve&comid=" . $row['c_id'] . "' class='activate btn btn-info'><i class='fa fa-close'></i> Approve</a>";
                                        }

                                        echo "</td>";
                            echo "</tr>";


                        }
                    
                    ?>


                    </table>
                </div>

            </div>


            <?php
        }
    elseif ($do == 'Edit'){ 
            
            $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

            $stmt = $con->prepare("SELECT * FROM comments WHERE c_id = ?");
            
            $stmt->execute(array($comid ));
            
            $row = $stmt->fetch();
            
            $count = ($stmt->rowCount() > 0);

            if($count > 0 ) { ?> 
                    <head>
                        <style>
                            .col-sm-10 {
                                margin-bottom: 15px;
                            }
                            label {
                                display: relative;
                            }
                        </style>
                    </head>

                    <h1 class="text-center">Edit Comment</h1>
                    <div class="container">
                        <form class="form-horizontal" action="?do=Update" method="POST">
                            <input type="hidden" name="comid" value="<?php echo $comid ?>" />
                            <!-- start Comment Filed -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Comment</label>
                                <div class="col-sm-10">
                                    <input type="text" name="comment" class="form-control" value="<?php echo $row['comment'] ?>" required="required" >
                                </div>
                            </div>
                            
                            <!-- end Comment Filed -->
             
                            <!-- start Button Filed -->

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>

                            <!-- end Button Filed -->
                            
                        </form>
                    </div>


            <?php 
                    
            } else {
            echo 'There is Not Such ID';
            }
    
    } 
    elseif ($do ==  'Update') {

        echo "<h1 class='text-center'>Update Comment</h1>";

        echo "<div class='container'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get Vairables From the form

            $comid   = $_POST['comid'];
            $comment = $_POST['comment'];
            
             // Update The DataBase With The Info

             $stmt = $con->prepare(
                 "UPDATE 
                    comments 
                SET 
                    comment = ? WHERE  c_id = ?");
             $stmt->execute(array($comment,$comid));
 
             // Echo Success Message
 
             $theMsg =  $stmt->rowCount() . " comment Updated";

             redirectHome($theMsg, 'back', 4);

        }
        else {
            echo "You Can't Browese This Directory";
        }
        echo "</div>";
    }
    elseif ($do == 'Delete') {

        echo "<h1 class='text-center'>Delete Comment</h1>";

        echo "<div class='container'>";

            $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

            $check = checkItem('c_id', 'comments', $comid);

            if($check > 0 ) { 

                $stmt = $con->prepare("DELETE FROM comments WHERE c_id = :zid");

                $stmt->bindParam(":zid", $comid);

                $stmt->execute();

                $theMsg =  "<div class='alert alert-danger'>" . $stmt->rowCount() . " Record Deleted</div>";

                redirectHome($theMsg, 'back', 1);

            }
            else {

                echo "Not Exist";
            }
        
            echo "</div>";

    }
      elseif($do == 'Approve') {

        echo "<h1 class='text-center'>Approve Comment</h1>";

        echo "<div class='container'>";

            $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

            $check = checkItem('c_id','comments', $comid);

            if($check > 0 ) { 

                $stmt = $con->prepare("UPDATE comments Set status = 1 WHERE c_id = ?");

                $stmt->execute(array($comid));

                $theMsg = "<div class='alert alert-info'>" . $stmt->rowCount() . " Record Approved</div>";
                
                redirectHome($theMsg, 'back', 1);

            }
            else {

                echo "This ID Is Not Exist";
            }
        
            echo "</div>";

      }
    
        include $tpl . "footer.php";
    } else {
        
        header('Location: index.php');
        
        exit();
    }

?>