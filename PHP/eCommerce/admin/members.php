<?php

session_start();

$pageTitle = "Members";

if (isset($_SESSION['Username'])) {


    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    // start Manage Page

    if ($do == 'Manage') {


        $query = '';

        if (isset($_GET['page']) && $_GET['page'] == 'Pending') {

            $query = 'AND RegStatus = 0';
        }

        $stmt = $con->prepare("SELECT * FROM users WHERE GroupID !=1 $query");

        $stmt->execute();

        $rows = $stmt->fetchAll();

?>

        <h1 class="text-center">Manage Members</h1>
        <div class="container">
            <div class="table-responsive">
                <table class="main-table table table-bordered">

                    <tr>

                        <td>#ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Full Name</td>
                        <td>Register Date</td>
                        <td>Control</td>

                    </tr>

                    <?php

                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['UserID']    .  "</td>";
                        echo "<td>" . $row['Username']  .  "</td>";
                        echo "<td>" . $row['Email']     .  "</td>";
                        echo "<td>" . $row['FullName']  .  "</td>";
                        echo "<td>" . $row['Date']      .  "</td>";
                        echo "
                                    <td> 
                                        <a href='members.php?do=Edit&userid=" . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i>Edit </a>
                                        <a href='members.php?do=Delete&userid=" . $row['UserID'] . "' class='btn btn-danger'><i class='fa fa-close'></i>Delete </a>";

                        if ($row['RegStatus'] == 0) {
                            echo "<a href='members.php?do=Activate&userid=" . $row['UserID'] . "' class='activate btn btn-info'><i class='fa fa-close'></i> Active </a>";
                        }

                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>


                </table>
            </div>

            <a href='members.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Member</a>

        </div>


    <?php
    } elseif ($do == 'Add') {
    ?>


        <h1 class="text-center">Add New Member</h1>
        <div class="container">
            <form class="form-horizontal" action="?do=Insert" method="POST">

                <!-- start Username Filed -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" required="required">
                    </div>
                </div>

                <!-- end Username Filed -->
                <!-- start Password Filed -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" autocomplete="new-password" required="required">
                    </div>
                </div>
                <!-- end Password Filed -->

                <!-- start Email Filed -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" required="required">
                    </div>
                </div>
                <!-- end Email Filed -->

                <!-- start Fullname Filed -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" name="full" class="form-control" required="required">
                    </div>
                </div>
                <!-- end Fullname Filed -->


                <!-- start Button Filed -->

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Add Member" class="btn btn-primary">
                    </div>
                </div>

                <!-- end Button Filed -->

            </form>
        </div>
        <?php
    } elseif ($do == 'Insert') {



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Add Member</h1>";

            echo "<div class='container'>";

            // Get Vairables From the form

            $user   = $_POST['username'];
            $pass   = sha1($_POST['password']);
            $email  = $_POST['email'];
            $name   = $_POST['full'];

            $hashPass = sha1($_POST['password']);

            // Password Trick

            $pass = '';

            if (empty($_POST['password'])) {
                $pass = $_POST['password'];
            } else {
                $pass = $hashPass;
            }

            // Validate Form 

            $formErrors = array();

            if (strlen($user) < 4) {

                $formErrors[] = "Username Can't be less than <strong> 4 charachters</strong></div>";
            }

            if (strlen($user) > 20) {

                $formErrors[] = "Username Can't be more than <strong>20 charachters</strong>";
            }

            if (empty($user)) {
                $formErrors[] = "Username Can't be <strong>empty</strong>";
            }

            if (empty($pass)) {
                $formErrors[] = "Password Can't be <strong>empty</strong>";
            }

            if (empty($name)) {
                $formErrors[] = "FullName Can't be <strong>empty</strong>";
            }

            if (empty($email)) {
                $formErrors[] = "Email Can't be <strong>empty</strong>";
            }

            foreach ($formErrors as $error) {

                echo "<div class='alert alert-danger'>" .  $error . "</div><br/>";
            }

            if (empty($formErrors)) {

                // Insert The DataBase With The Info

                $check = checkItem("Username", "users", $user);

                if ($check === 1) {

                    echo "Sorry This User Is Exist";
                } else {
                    $stmt = $con->prepare("INSERT INTO 
                                                users(Username, Password, Email, FullName, RegStatus, Date)
                                            VALUES
                                                    (:zuser, :zpass, :zmail, :zname, 1, now())
                                            ");
                    $stmt->execute(array(
                        'zuser' => $user,
                        'zpass' => $hashPass,
                        'zmail' => $email,
                        'zname' => $name
                    ));

                    // Echo Success Message

                    echo "<div class='alert alert-success'>" . $stmt->rowCount() . " Recorded Inserted</div>";
                }
            }
        } else {
            $theMsg = "<div class='alert alert-danger'>You Can't Browese This Directory</div>";

            redirectHome($theMsg);
        }
        echo "</div>";
    } elseif ($do == 'Edit') {

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

        $stmt->execute(array($userid));

        $row = $stmt->fetch();

        $count = ($stmt->rowCount() > 0);

        if ($stmt->rowCount() > 0) { ?>

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

            <h1 class="text-center">Edit Member</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
                    <!-- start Username Filed -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>" required="required">
                        </div>
                    </div>

                    <!-- end Username Filed -->
                    <!-- start Password Filed -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>">
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" required="required">
                        </div>
                    </div>
                    <!-- end Password Filed -->

                    <!-- start Email Filed -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="<?php echo $row['Email'] ?>" required="required">
                        </div>
                    </div>
                    <!-- end Email Filed -->

                    <!-- start Fullname Filed -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Fullname</label>
                        <div class="col-sm-10">
                            <input type="text" name="full" class="form-control" value="<?php echo $row['FullName'] ?>" required="required">
                        </div>
                    </div>
                    <!-- end Fullname Filed -->


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
    } elseif ($do ==  'Update') {

        echo "<h1 class='text-center'>Update Member</h1>";

        echo "<div class='container'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get Vairables From the form

            $id     = $_POST['userid'];
            $user   = $_POST['username'];
            $email  = $_POST['email'];
            $name   = $_POST['full'];

            // Password Trick

            $pass = '';

            if (empty($_POST['newpassword'])) {
                $pass = $_POST['oldpassword'];
            } else {
                $pass = sha1($_POST['newpassword']);
            }

            // Validate Form 

            $formErrors = array();

            if (strlen($user) < 4) {

                $formErrors[] = "Username Can't be less than <strong> 4 charachters</strong></div>";
            }

            if (strlen($user) > 20) {

                $formErrors[] = "Username Can't be more than <strong>20 charachters</strong>";
            }

            if (empty($user)) {
                $formErrors[] = "Username Can't be <strong>empty</strong>";
            }

            if (empty($name)) {
                $formErrors[] = "FullName Can't be <strong>empty</strong>";
            }

            if (empty($email)) {
                $formErrors[] = "Email Can't be <strong>empty</strong>";
            }

            foreach ($formErrors as $error) {

                echo "<div class='alert alert-danger'>" .  $error . "</div><br/>";
            }
            if (empty($formErrors)) {

                // Update The DataBase With The Info

                $stmt = $con->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
                $stmt->execute(array($user, $email, $name, $pass, $id));

                // Echo Success Message

                echo $stmt->rowCount() . " Recorded Updated";


                $errorMsg = "You Can't Browese This Directory";

                redirectHome($errorMsg, 6);
            }
        } else {
            echo "You Can't Browese This Directory";
        }
        echo "</div>";
    } elseif ($do == 'Delete') {

        echo "<h1 class='text-center'>Delete Member</h1>";

        echo "<div class='container'>";

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

        $stmt->execute(array($userid));

        $count = ($stmt->rowCount() > 0);

        if ($stmt->rowCount() > 0) {

            $stmt = $con->prepare("DELETE FROM users WHERE UserID = :zuser");

            $stmt->bindParam(":zuser", $userid);

            $stmt->execute();

            echo "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Deleted</div>";
        } else {

            echo "Not Exist";
        }

        echo "</div>";
    } elseif ($do == 'Activate') {

        echo "<h1 class='text-center'>Active Member</h1>";

        echo "<div class='container'>";

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

        $stmt->execute(array($userid));

        $count = ($stmt->rowCount() > 0);

        if ($stmt->rowCount() > 0) {

            $stmt = $con->prepare("UPDATE users Set RegStatus =1 WHERE UserID = ?");

            $stmt->execute(array($userid));

            $theMsg = "<div class='alert alert-info'>" . $stmt->rowCount() . " Record Activated</div>";

            redirectHome($theMsg);
        } else {

            echo "Not Exist";
        }

        echo "</div>";
    }

    include $tpl . "footer.php";
} else {

    header('Location: index.php');

    exit();
}

?>