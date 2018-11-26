<?php

session_start();

$link = mysqli_connect('localhost', 'root', '', 'mealplanner');
/*mysqli_set_charset($link,"utf8");*/

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}

/*mysqli_query($link,"set names utf8");
mysqli_query($link,"set charset set utf8");*/

$error="";

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $passwordConfirm = mysqli_real_escape_string($link, $_POST['passwordConfirm']);

    if ($name == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave name field empty</div><br>';
    }
    if ($email == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave email field empty</div><br>';
    }
    if ($password == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave password field empty</div><br>';
    } elseif (strlen($password) < 4 || strlen($password) > 12) {
        $error = '<div class="alert alert-dark" role="alert">Password should be between 4 and 12 characters long</div><br>';
    } elseif ($password !== $passwordConfirm) {
        $error = '<div class="alert alert-dark" role="alert">Passwords do not match</div><br>';
    } else {
        $query = "SELECT id FROM users WHERE email = '$email' OR name = '$name'";
        $result = mysqli_query($link, $query);
        if (!$result) {
            die ('Connection failed' . mysqli_error());
        }

        $row = mysqli_fetch_array($result);
        echo mysqli_num_rows($result);

        if (mysqli_num_rows($result) > 0) {
            $error = '<div class="alert alert-dark" role="alert">Username or email already registered</div><br>';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$hashed_password')";

            if ($result = mysqli_query($link, $query)) {
                $_SESSION['name'] = $_POST['name'];
                header("Location: main.php");
            } else {
                echo 'Entry failed';
            }
        }
    }
}

/*require_once "config.php";
if (isset($_SESSION['access_token'])) {
header('Location: index.php');
exit();
}
$redirectURL = "http://localhost/FacebookLogin/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL, $permissions);*/
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">

            <h1>Please Sign Up!</h1><br>
            <span id="error"><?php echo $error; ?></span>
            <form accept-charset="UTF-8" method="post">
                <input type="text" id="name" name="name" placeholder="Your username" class="form-control"><br>
                <input type="email"id="email" name="email" placeholder="Email" class="form-control"><br>
                <input type="password" id="password" name="password" type="password" placeholder="Password" class="form-control"><br>
                <input type="password" id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Confirm password" class="form-control"><br>
                <input name="submit" type="submit" value="Sign Up" class="btn btn-primary">
                <input type="button" value="Sign Up With Facebook" class="btn btn-primary" disabled>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

