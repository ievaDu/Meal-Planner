<?php

session_start();
$name = $_SESSION['name'];

header('Content-Type: text/html; charset=utf-8');

$link = mysqli_connect('localhost', 'root', '', 'mealplanner');

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}

function breakfast ($link){
    $name = $_SESSION['name'];
    $query = "SELECT title FROM receptes WHERE username = '$name' AND breakfast = '1' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    echo $row['title'];
}

function lunch ($link){
    $name = $_SESSION['name'];
    $query = "SELECT title FROM receptes WHERE username = '$name' AND lunch = '1' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    echo $row['title'];
}

function dinner($link){
    $name = $_SESSION['name'];
    $query = "SELECT title FROM receptes WHERE username = '$name' AND dinner = '1' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    echo $row['title'];
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

</head>


    <div class="col-sm">
        <h2 style="text-decoration: underline">Monday</h2>

        <h4>Breakfast</h4>

        <?php

        breakfast($link);


        ?>

        <h4>Lunch</h4>

        <?php

        lunch($link);
        ?>


        <h4>Dinner</h4>


        <?php

                dinner($link);
        ?>
        <br><br><br>


    </div>






<div class="col-sm">
        <h2 style="text-decoration: underline">Tuesday</h2>

        <h4>Breakfast</h4>
        <?php
        breakfast($link);

        ?>

        <h4>Lunch</h4>

        <?php

        lunch($link);
        ?>


        <h4>Dinner</h4>


        <?php

        dinner($link);

        ?>
        <br><br><br>
    </div>

    <div class="col-sm">
        <h2 style="text-decoration: underline">Wednesday</h2>

        <h4>Breakfast</h4>
        <?php
        breakfast($link);

        ?>

        <h4>Lunch</h4>

        <?php

        lunch($link);
        ?>


        <h4>Dinner</h4>


        <?php

        dinner($link);

        ?>
        <br><br><br>


</div>

    <div class="col-sm">
        <h2 style="text-decoration: underline">Thursday</h2>

        <h4>Breakfast</h4>
        <?php
        breakfast($link);

        ?>

        <h4>Lunch</h4>

        <?php

        lunch($link);
        ?>


        <h4>Dinner</h4>


        <?php

        dinner($link);

        ?>
        <br><br><br>


    </div>

    <div class="col-sm">
        <h2 style="text-decoration: underline">Friday</h2>

        <h4>Breakfast</h4>
        <?php
        breakfast($link);

        ?>

        <h4>Lunch</h4>

        <?php

        lunch($link);
        ?>


        <h4>Dinner</h4>


        <?php

        dinner($link);

        ?>
        <br><br><br>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/ajax_load.js"></script>



    </body>
</html>