<?php
session_start();

$name = $_SESSION['name'];

$link = mysqli_connect('localhost', 'root', '', 'menugenerator');

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Your Meal Planner</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img/MealPlanner-logo.png"></a>
    <li style="list-style: none" class="nav-item">
        <span>Welcome, <?php echo ' '.$_SESSION['name'].'!' ?></span>
    </li>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newRecipe.php">New recipe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mealPlanner.php">Meal planner</a>
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

<h2>My recipes</h2>
<?php

$query = "SELECT title FROM `receptes` WHERE username = '$name'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)){
    echo $row['title'].'<br>';
}

?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>