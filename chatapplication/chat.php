<?php

    session_start();
	require_once('functions.php');
	if(!logged_in()){
		header('location: index.php');
	}

	if(isset($_POST['setmessage'])){
		$email = $_SESSION['email'];
		$message = $_POST['message'];
		$insert = $db_connection->query("INSERT INTO conversation(email, message) VALUES('$email', '$message')");

		die();
	}



    if(isset($_POST['updatemsg'])){


        $messages = $db_connection->query("SELECT * FROM conversation");

        while($info = mysqli_fetch_assoc($messages)){
            $email = $info['email'];
            $query = $db_connection->query("SELECT * FROM users WHERE email_address = '$email'");
            $queryval = mysqli_fetch_assoc($query);

            echo '<p class="text"><span class="fullname">'.$queryval['first_name'].' '.$queryval['last_name'].':</span> '.$info['message'].'</p>';

        }

        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="col-lg-6 m-auto my-5">
        <div class="card chat-card p-2">
        
        </div>
        <div class="chat">
            <form action="" method="post" class="sendmessage">
                <input  type="text" name="message" placeholder="Type Something" id="textmessage" >
                <input type="submit" value="Send" name="send" class=" w-20">
            </form>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>