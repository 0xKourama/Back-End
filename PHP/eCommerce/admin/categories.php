<?php

    ob_start();

    session_start();

    $pageTitle = "Categories";

    if (isset($_SESSION['Username'])) {
        

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if($do == 'Manage') 
        {

            $sort = 'DESC';

            $stmt2 = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");

            $stmt2->execute();

            $cats = $stmt2->fetchAll(); ?>

            <h1 class="text-center">Manage Categories</h1>
            <div class="container categories">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Categories</div>
                    <div class="panel-body">
                        <?php
                            foreach($cats as $cat) {
                                echo "<div class='cat'>";
                                    echo "<div class='hidden-buttons'>";
                                        echo "<a href='categories.php?do=Edit&catid=" . $cat['ID'] . "' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i> Edit</a>";
                                        echo "<a href='categories.php?do=Delete&catid=" . $cat['ID'] . "' class='btn btn-xs btn-danger'><i class='fa fa-close'></i> Delete</a>";
                                    echo "</div>";
                                    echo "<h3>" . $cat['Name'] . "</h3>";
                                    echo "<p class='p'>"; if($cat['Describtion'] == '') {echo 'This Category Description is Empty'; } else { echo $cat['Describtion'];} echo "</p>";
                                    if ($cat['Visibility'] == 1) { echo "<span class='visibility cat-span'><i class='fa fa-eye'></i>Hidden</span> ";}
                                    if ($cat['Allow_Comment'] == 1) { echo "<span class='commenting cat-span'><i class='fa fa-close'></i>Comment Disabled</span> ";}
                                    if ($cat['Allow_Ad'] == 1) { echo "<span class='advertises cat-span'><i class='fa fa-close'></i>Ads Disabled</span> ";}

                                echo "</div>";
                                echo "<hr>";
                            }
                        ?>
                    </div>
                </div>
                <a class="add-category btn btn-primary" href="categories.php?do=Add"><i class='fa fa-plus'></i> Add New Category</a>
            </div>
            <?php
        }
        elseif ($do == 'Add') 
        { ?>
            <h1 class="text-center">Add New Category</h1>
                <div class="container">
                    <form class="form-horizontal" action="?do=Insert" method="POST">
                        
                        
                        <!-- start Name Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control"  required="required" >
                            </div>
                        </div>
                        
                        <!-- end Username Filed -->
                        <!-- start Description Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" autocomplete="new-password" placeholder="Descripe Your Category">
                            </div>
                        </div>
                        <!-- end Description Filed -->

                        <!-- start Ordering Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ordering</label>
                            <div class="col-sm-10">
                                <input type="text" name="ordering" class="form-control"  required="required">
                            </div>
                        </div>
                        <!-- end Ordering Filed -->

                        <!-- start Visibility Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Visible</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="vis-yes" type="radio" name="visibility" value="0" checked>
                                    <label for="vis-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="vis-no" type="radio" name="visibility" value="1" >
                                    <label for="vis-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Visibility Filed -->

                        <!-- start Commenting Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Allow Comment</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="com-yes" type="radio" name="commenting" value="0" checked>
                                    <label for="com-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="com-no" type="radio" name="commenting" value="1" >
                                    <label for="com-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Commenting Filed -->

                        <!-- start Visibility Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Allow Ads</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="ads-yes" type="radio" name="ads" value="0" checked>
                                    <label for="ads-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="ads-no" type="radio" name="ads" value="1" >
                                    <label for="ads-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Visibility Filed -->
                        <!-- start Button Filed -->

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Add Category" class="btn btn-primary">
                            </div>
                        </div>

                        <!-- end Button Filed -->
                        
                    </form>
                </div>
                <?php

                
        }
        elseif ($do == 'Insert') 
        {
                   
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                echo "<h1 class='text-center'>Add Category</h1>";

                echo "<div class='container'>";
    
                // Get Vairables From the form
    
                $name   = $_POST['name'];
                $desc   = $_POST['description'];
                $order   = $_POST['ordering'];
                $visible   = $_POST['visibility'];
                $comment   = $_POST['commenting'];
                $ads   = $_POST['ads'];
            
                // Insert The DataBase With The Info

                $check = checkItem("Name","categories",$user);

                if ($check === 1) 
                    {

                        echo "Sorry This User Is Exist";
                    }
                else
                    {
                        $stmt = $con->prepare("INSERT INTO 
                                            categories(Name, Describtion, Ordering, Visibility, Allow_Comment, Allow_Ad)
                                        VALUES
                                                (:zname, :zdesc, :zorder, :zvisible, :zcomment, :zads)
                                        ");
                        $stmt->execute(array(
                            'zname' => $name,
                            'zdesc' => $desc,
                            'zorder' => $order,
                            'zvisible' => $visible,
                            'zcomment' => $comment,
                            'zads' => $ads
                            
                        ));
                        
                        // Echo Success Message
            
                        $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . " Recorded Inserted</div>";

                        redirectHome($theMsg, 'back');
                    }
    
               
        
            }   
            else {
                $theMsg = "<div class='alert alert-danger'>You Can't Browese This Directory</div>";

                redirectHome($theMsg);
            }
            echo "</div>";
    
        } 
        elseif ($do == 'Edit')
        { 
            $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

            $stmt = $con->prepare("SELECT * FROM categories WHERE ID = ?");
            
            $stmt->execute(array($catid));
            
            $cat = $stmt->fetch();
            
            $count =$stmt->rowCount();

            if($count > 0) { ?>

                <h1 class="text-center">Edit Category</h1>
                <div class="container">
                    <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="hidden" name="catid" value="<?php echo $catid ?>" />
                        
                        <!-- start Name Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control"  required="required" value="<?php echo $cat['Name'] ?>">
                            </div>
                        </div>
                        
                        <!-- end Username Filed -->
                        <!-- start Description Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control"  placeholder="Descripe Your Category" value="<?php echo $cat['Describtion'] ?>">
                            </div>
                        </div>
                        <!-- end Description Filed -->

                        <!-- start Ordering Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ordering</label>
                            <div class="col-sm-10">
                                <input type="text" name="ordering" class="form-control"  required="required" value="<?php echo $cat['Ordering'] ?>">
                            </div>
                        </div>
                        <!-- end Ordering Filed -->

                        <!-- start Visibility Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Visible</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="vis-yes" type="radio" name="visibility" value="0" <?php if($cat['Visibility'] == 0){ echo 'checked'; }?> >
                                    <label for="vis-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="vis-no" type="radio" name="visibility" value="1" <?php if($cat['Visibility'] == 1){ echo 'checked'; }?>>
                                    <label for="vis-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Visibility Filed -->

                        <!-- start Commenting Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Allow Comment</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="com-yes" type="radio" name="commenting" value="0" <?php if($cat['Allow_Comment'] == 0){ echo 'checked'; }?>>
                                    <label for="com-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="com-no" type="radio" name="commenting" value="1" <?php if($cat['Allow_Comment'] == 1){ echo 'checked'; }?>>
                                    <label for="com-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Commenting Filed -->

                        <!-- start Visibility Filed -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Allow Ads</label>
                            <div class="col-sm-10 col-md-6">
                                <div>
                                    <input id="ads-yes" type="radio" name="ads" value="0" <?php if($cat['Allow_Ad'] == 0){ echo 'checked'; }?>>
                                    <label for="ads-yes">Yes</label>
                                </div>
                                <div>
                                    <input id="ads-no" type="radio" name="ads" value="1" <?php if($cat['Allow_Ad'] == 1){ echo 'checked'; }?>>
                                    <label for="ads-no">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- end Visibility Filed -->
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
        elseif ($do ==  'Update') 
        {
            echo "<h1 class='text-center'>Update Category</h1>";

            echo "<div class='container'>";
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                // Get Vairables From the form
    
                $id    = $_POST['catid'];
                $name   = $_POST['name'];
                $desc   = $_POST['description'];
                $order   = $_POST['ordering'];
                $visible   = $_POST['visibility'];
                $comment   = $_POST['commenting'];
                $ads   = $_POST['ads'];                
    
                    // Update The DataBase With The Info
        
                    $stmt = $con->prepare(
                        "UPDATE 
                            categories 
                        SET 
                            Name = ?,
                            Describtion = ?,
                            Ordering = ?,
                            Visibility = ?,
                            Allow_Comment = ?, 
                            Allow_Ad = ?
                        WHERE 
                            ID = ?");

                    $stmt->execute(array($name,$desc,$order, $visible, $comment, $ads, $id));
        
                    // Echo Success Message
        
                    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . " Recorded Updated</div>";
        
                    redirectHome($theMsg, 'back');
    
               
            }
            else {
                echo "You Can't Browese This Directory";
            }
            echo "</div>";
        
        }
        elseif ($do == 'Delete')
        {
            echo "<h1 class='text-center'>Delete Category</h1>";

            echo "<div class='container'>";

            $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

            $check = checkItem('ID', 'categories', $catid);

            if($check > 0 ) { 

                $stmt = $con->prepare("DELETE FROM categories WHERE ID = :zid");

                $stmt->bindParam(":zid", $catid);

                $stmt->execute();

                $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Deleted</div>";

                redirectHome($theMsg, 'back');
            }
            else {

                $theMsg = "<div class='alert alert-danger'>This ID Not Exist</div>";

                redirectHome($theMsg);
            }
        
            echo "</div>";

        }

        include $tpl . "footer.php";
    }
    else {
        
        header('Location: index.php');
        
        exit();
    }
    
    
?>