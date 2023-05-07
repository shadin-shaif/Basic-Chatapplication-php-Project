<?php
session_start();
require_once('functions.php');

if(logged_in()){
    header('location:chat.php');
}

if(isset($_POST['login'])){

    //set val from script.js
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = $db_connection->query("SELECT * FROM users WHERE email_address = '$email'");
    $fetch = mysqli_fetch_object($query);

    $pass = $fetch->password;
    $first_name = $fetch->first_name;
    $last_name = $fetch->last_name;

    if($pass == $password){
        $_SESSION['login'] = "successful";
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        header('location: chat.php');
    }

    die();
}
else{

}

?>
<!doctype html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<title>login Form</title>
<body>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card my-5">
                <div class="card-header"><h4>Sign In</h4></div>
                <div class="card-body">

                    <form action="" method="post" id="login">
                      
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <div class="error">
                                <p class=" text-danger ">
                                    <?php if(isset($error['email'])){
                                        echo $error['email'];
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <div class="error">
                                <p class=" text-danger ">
                                    <?php if(isset($_SESSION['success'])){
                                        echo $_SESSION['success'];
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <input type="submit" value="Log in" class="btn btn-primary" name="login">
                        </div>
                    </form>
                    <p class=" text-danger ">
                        <?php if(isset($not_exist)){
                            echo $not_exist;
                        } ?>
                    </p>
                    <p>if you not existing user, please <a class="register" href="register.php"> Register </a> </p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>


