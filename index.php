<?php

session_start();

$link = mysqli_connect('localhost', 'root', '', 'menugenerator');

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}

/*mysqli_query($link,"set names utf8");
mysqli_query($link,"set charset set utf8");*/

$error="";

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    if ($name == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave username field empty</div><br>';
    }
    if ($password == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave password field empty</div><br>';
    } else {
        $query = "SELECT name,password FROM `users` WHERE name = '$name'";
        $result = mysqli_query($link, $query);

        if (!$result) {
            die ('Connection failed' . mysqli_error());
        }
        $row = mysqli_fetch_array($result);

        if (($row['name'] === $name) && (password_verify($password, $row['password']))){
            $_SESSION['name'] = $_POST['name'];
            if ($_POST['checked_in']) {
            setcookie('name', '$_POST["name"]', time() + 60 * 60 * 24 * 30);
            }
            header("Location: main.php");
        } else {

            $error = '<div class="alert alert-dark" role="alert">Username or password is incorrect</div><br>';
        }

        /*if (password_verify($password, $row['password'])) {
            $error = '<div class="alert alert-dark" role="alert">Password is incorrect</div><br>';
            } else {

        }*/

}}

?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/resetHtml.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Your meal planner!</title>
</head>
<body>


<div class="container">

<h1>Log in</h1>

<span id="error"><?php echo $error; ?></span>
    <div class="row">
        <div class="col-sm">

            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="checked_in" value="1" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Stay logged in</label>
                </div>
                <button name="submit" type="submit" id="mainButton" btn btn-primary">Submit</button>
            </form>

    <div>
        <p id="signUp">New to the Menu generator?</p><br><br>
        <p id="signUpLink
"><a href="signUp.php">Sign up!</a></p>
    </div>





</div>
        <div class="col-sm"><div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/1.jpg" style="width: 500px; height: auto;" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/2.jpg" style="width: 500px; height: auto;" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/3.jpg" style="width: 500px; height: auto;" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/4.jpg" style="width: 500px; height: auto;" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/5.jpg" style="width: 500px; height: auto;" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div></div>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="js/main.js"></script>-->
</body>
</html>

