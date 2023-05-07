<?php
    session_start();
    require_once(dirname(__FILE__).'/functions.php');
    if(logged_in()){
        header('location:chat.php');
    }

    if(isset($_POST['register'])){

        //set val from script.js
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        //email validation
        $email_check = $db_connection->query("SELECT * FROM users WHERE email_address = '$email'");
        if(mysqli_num_rows($email_check) == 1){
            echo "Email already exits! try again";
        }
        else{
            //insert data on DB
            $query = $db_connection->query("INSERT INTO users (first_name, last_name, email_address, password) VALUES('$fname','$lname','$email','$password')");

            if($query){
                echo "You have been registered successfully!";
            }
            
        }
        die();
    }

?>

<!doctype html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<title>Registration Form</title>
<body>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card my-5">
                <div class="card-header"><h4>Create an Account</h4></div>
                <div class="card-body">

                    <form action="" method="post" id="register">

                        <div class="form-group">
                            <label for="fname" class="form-label">First name</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group my-3">
                            <input type="submit" value="Register" class="btn btn-primary" name="register">
                        </div>
                    </form>
                  
                    <p class="text-success"> </p>

                    <p>Already have an account, please <a class="login" href="login.php"> Log in </a> </p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>


