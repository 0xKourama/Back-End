<?php 
    session_start();
    $pageTitle = 'Login';
    
    if (isset($_SESSION['user'])) {
        header('Location: index.php'); // Redirect io Dashboard Page
    }

    include 'init.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $hashedPass = sha1($pass);

        // check if user exist in db

        $stmt = $con->prepare("SELECT
                                    Username, Password,UserID 
                                FROM 
                                    users 
                                WHERE 
                                    Username = ? 
                                AND 
                                    Password = ? ");
        $stmt->execute(array($user, $hashedPass));

        $get = $stmt->fetch();

        $count = $stmt->rowCount();

        // if count > 0  -> contain record;

        // echo $coun   t;

        if ($count > 0) {

            $_SESSION['user'] = $user; // Register User Session Name

            $_SESSION['uid'] = $get['UserID']; // Register User ID in Session

            /*header('Location: index.php');*/ // Redirect io Dashboard Page

            exit();
        }
        else {

            $formErros = array();

            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $password2  = $_POST['password2'];
            $email  = $_POST['email'];
            
            if (isset($username)) {
                
                $filterdUser = filter_var($username, FILTER_SANITIZE_STRING);

                if($filterdUser < 4 ) {
                    $formErros[] = "Username Must be Greater Than 4 Charachters"; 
                }
                
            }
            if (isset($password) && isset($password2)) {


                if (empty($password )) {

                    $formErros[] = "Sorry Password Cant be Empty";
                }

                $pass1 = sha1($password);
                $pass2 = sha1($password2);

                if (sha1($pass1) !== sha1($pass2)) {
                    
                    $formErros[] = "Sorry, Password is Not Match";
                }
                
            }
            if (isset($email)) {
                
                $filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

                if(filter_var($filterdEmail, FILTER_SANITIZE_EMAIL) != true) {

                    $formErros[] = "This Email Is Not Valid"; 
                }
                
                
            }

            if (empty($formErrors)) {

                // Insert The DataBase With The Info

                $check = checkItem("Username", "users", $username);

                if ($check === 1) {

                    $formErros[] = "Sorry This User Is Exist";

                } else {
                    $stmt = $con->prepare("INSERT INTO 
                                                users(Username, Password, Email, RegStatus, Date)
                                            VALUES
                                                    (:zuser, :zpass, :zmail, 0, now())
                                            ");
                    $stmt->execute(array(
                        'zuser' => $username,
                        'zpass' => sha1($password),
                        'zmail' => $email
                        
                    ));

                    // Echo Success Message

                    $successMsg = 'Congrats You Are Now Registerd User';
                }
            }

        }
    }

     
?>


<div class="container login-page">
    <h1 class="text-center">
        <span class="login">Login</span> | <span class="signup">Signup</span>
    </h1>
    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="input-container">    
            <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Type Your Username">
        </div>
        <div class="input-container">    
            <input class="form-control" type="password" name="password" autocomplete="new-password" placeholder="Type Your Password">
        </div>
        <div class="input-container">    
            <input class="btn btn-primary btn-block" name="login" type="submit" value="Login">
        </div> 
    </form>
    <form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <class class="input-container">
            <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Type Your Username">
        </class>
        <class class="input-container">
            <input class="form-control" type="password" name="password" autocomplete="new-password" placeholder="Type a Complex Password">
        </class>
        <class class="input-container">
            <input class="form-control" type="password" name="password2" autocomplete="new-password" placeholder="Type a Password again">
        </class>
        <class class="input-container">
            <input class="form-control" type="text" name="email" placeholder="Type a Valid Email">
        </class>
        <class class="input-container">
            <input class="btn btn-success btn-block" name="signup" type="submit" value="Signup">
        </class>
    </form>
    <div class="the-error text-center">
        <?php
            if (!empty($formErros)) {
                foreach ($formErros as $error) {
                    echo $error . "<br>";
                }
            }
            if (isset($successMsg)) {
                echo "<div class='msg success'>" . $successMsg . "</div>";
            }
        ?>
    </div>
</div>

<?php include $tpl . 'footer.php';?>