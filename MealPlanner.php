<?php

session_start();
$name = $_SESSION['name'];

header('Content-Type: text/html; charset=utf-8');

$link = mysqli_connect('localhost', 'root', '', 'mealplanner');

/*mysqli_set_charset($link,"utf8");*/

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}

?>

    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">



        <title>Meal Planner</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img/MealPlanner-logo.png"></a>
    <li style="list-style: none" class="nav-item">
        <span>Enjoy, <?php echo ' '.$name.'!'?></span>
    </li>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="main.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newRecipe.php">New recipe<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Meal planner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shoppingList.php">Shopping list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Log out</a>
            </li>
        </ul>
    </div>
</nav>
    <br><br>




    <div class="row" id="ajaxdiv">


    </div>

    <button type="submit" name="submit" class="btn btn-warning" onclick="loadDoc()">Generate your meal plan</button>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ajax_load.js"></script>



    </body>
    </html>


<?php
/**
 * Created by PhpStorm.
 * User: Ieva
 * Date: 11/25/2018
 * Time: 10:42 PM
 */