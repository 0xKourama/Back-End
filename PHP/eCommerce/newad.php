<?php

session_start();

$pageTitle = "Create New Item";

include "init.php";

if (isset($_SESSION['user'])) {

        /*print_r($_SESSION);*/
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    }
    

    $formErrors = array();

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $desc = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);

    if(strlen($name) < 4) {

        $formErrors[] = 'Item Title Must Be at least 4 Charachters';

    }
    if(strlen($desc) < 10) {

        $formErrors[] = 'Item Description Must Be at least 10 Charachters';

    }
    if(strlen($country) < 2) {

        $formErrors[] = 'Item Country Must Be at least 2 Charachters';

    }
    if(empty($price)) {

        $formErrors[] = 'Item Price Must Be Empty';
    }
    if(empty($status)) {

        $formErrors[] = 'Item Status Must Be Empty';
    }
    if(empty($category)) {

        $formErrors[] = 'Item Category Must Be Empty';
    }
    if(empty($formErrors)) 
               {
        
                    $stmt = $con->prepare("INSERT INTO 
                                        items(Name, Description, Price, Country_Made, Status, Add_Date, Cat_ID, Member_ID)
                                    VALUES
                                            (:zname, :zdesc, :zprice, :zcountry, :zstatus, now(),:zcat, :zmember);
                                    ");
                    $stmt->execute(array(
                        'zname'    => $name,
                        'zdesc'    => $desc,
                        'zprice'   => $price,
                        'zcountry' => $country,
                        'zstatus'  => $status,
                        'zcat'     => $category,
                        'zmember'  => $_SESSION['uid']

                    ));
                    
                    // Echo Success Message
        
                    if($stmt) {
                        $theMsg = "Item Added";
                        echo "<div class='alert alert-success'>" . $theMsg . "</div>";
                    }
                    
                }

?>

    <h1 class="text-center"><?php echo $pageTitle; ?></h1>
    <div class="create-ad block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $pageTitle; ?></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <!-- start Name Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" placeholder="Name of the Item">
                                    </div>
                                </div>
                                <!-- end Name Filed -->

                                <!-- start Description Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="description" class="form-control" placeholder="Description of the Item">
                                    </div>
                                </div>
                                <!-- end Description Filed -->

                                <!-- start Price Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="price" class="form-control" placeholder="price of the Item">
                                    </div>
                                </div>
                                <!-- end Price Filed -->

                                <!-- start Country Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="country" class="form-control" placeholder="Country of Made">
                                    </div>
                                </div>
                                <!-- end Country Filed -->

                                <!-- start Status Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control">
                                            <option value="">...</option>
                                            <option value="1">New</option>
                                            <option value="2">Like New</option>
                                            <option value="3">Used</option>
                                            <option value="4">Very Old</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end Status Filed -->

                                <!-- start Category Filed -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="category" class="form-control">
                                            <option value="">...</option>
                                            <?php

                                            $stmt2 = $con->prepare("SELECT * FROM categories");
                                            $stmt2->execute();
                                            $cats = $stmt2->fetchAll();
                                            foreach ($cats as $cat) {
                                                echo "<option value='" . $cat['ID'] . "'>" . $cat['Name'] . "</option>";
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end Category Filed -->

                                <!-- start Submit Filed -->
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Add Item" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                                <!-- end Submit Filed -->

                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail item-box">
                                <span class="price-tag">0</span>
                                <img src="img.png" class="img-responsive">
                                <div class="caption">
                                    <h3>Title</h3>
                                    <p>Description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Start Looping Through Error-->
                    <?php
                        if(! empty($formErrors)) {
                            foreach($formErrors as $error) {
                                echo "<div class='alert alert-danger'>" . $error . "</div>";
                            }
                        }
                    ?>
                    
                    <!--End Looping Through Error-->
                </div>
            </div>
        </div>
    </div>


<?php
} else {
    header('location: login.php');

    exit();
}
include $tpl . "footer.php";

?>