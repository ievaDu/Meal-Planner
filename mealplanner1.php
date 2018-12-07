<?php

include "db.php";
include "session.php";
include "functions.php";

date_default_timezone_set('Europe/Riga');

$query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $titleBreakfast = $row['title'];
}

$query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $titleLunch = $row['title'];
}

$query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
    $titleDinner = $row['title'];

}



if(isset($_POST['save'])){
    $day1 = mysqli_real_escape_string($link, $_POST['day1']);
    $selectBreakfastDay1 = mysqli_real_escape_string($link, $_POST['selectBreakfastDay1']);
    $selectLunchDay1 = mysqli_real_escape_string($link, $_POST['selectLunchDay1']);
    $selectDinnerDay1 = mysqli_real_escape_string($link, $_POST['selectDinnerDay1']);
    $day2 = mysqli_real_escape_string($link, $_POST['day2']);
    $selectBreakfastDay2 = mysqli_real_escape_string($link, $_POST['selectBreakfastDay2']);
    $selectLunchDay2 = mysqli_real_escape_string($link, $_POST['selectLunchDay2']);
    $selectDinnerDay2 = mysqli_real_escape_string($link, $_POST['selectDinnerDay2']);
    $day3 = mysqli_real_escape_string($link, $_POST['day3']);
    $selectBreakfastDay3 = mysqli_real_escape_string($link, $_POST['selectBreakfastDay3']);
    $selectLunchDay3 = mysqli_real_escape_string($link, $_POST['selectLunchDay3']);
    $selectDinnerDay3 = mysqli_real_escape_string($link, $_POST['selectDinnerDay3']);
    $day4 = mysqli_real_escape_string($link, $_POST['day4']);
    $selectBreakfastDay4 = mysqli_real_escape_string($link, $_POST['selectBreakfastDay4']);
    $selectLunchDay4 = mysqli_real_escape_string($link, $_POST['selectLunchDay4']);
    $selectDinnerDay4 = mysqli_real_escape_string($link, $_POST['selectDinnerDay4']);
    $day5 = mysqli_real_escape_string($link, $_POST['day5']);
    $selectBreakfastDay5 = mysqli_real_escape_string($link, $_POST['selectBreakfastDay5']);
    $selectLunchDay5 = mysqli_real_escape_string($link, $_POST['selectLunchDay5']);
    $selectDinnerDay5 = mysqli_real_escape_string($link, $_POST['selectDinnerDay5']);

    $query = "INSERT INTO `menu_new` (`title` , `url` , `breakfast` , `lunch` , `dinner` , `ingredient` , `description` , `tag` , `username`) VALUES ('$title','$url','$breakfastTick','$lunchTick','$dinnerTick','$ingredient','$description','$tag','$name')";
    $result = mysqli_query($link, $query);
    if(! $result ) {
        die('Could not delete data: . '.mysqli_error($link));
    } else {
        $message = "<div class=\"alert alert-success\" role=\"alert\">Recipe added successfully<br><br><a class=\"btn btn-success\" href=\"main.php\" role=\"button\">Back to the main page</a></div>";
    }

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

<?php
include "navbar.html";
?>
<form method="post">
    <div class="form-row">

        <div class="form-group col-sm">
            <h2>Day one</h2>
            <input type="date" name="day1" class="form-control" id="day1" value=""><br>

            <div class="form-group">
                <label for="breakfastDay1"><b>Breakfast</b></label>
                <input type="hidden" name="breakfastDay1" value="">
            </div>

            <label for="selectBreakfastDay1">Select your breakfast recipe</label>
            <select name="selectBreakfastDay1">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleBreakfast = $row['title'];
                    echo "<option>".$titleBreakfast."</option>";
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="lunchDay1"><b>Lunch</b></label>
                <input type="hidden" name="LunchDay1" value="lunchDay1">
            </div>

            <label for="selectLunchDay1">Select your lunch recipe</label>
            <select name="selectLunchDay1">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleLunch = $row['title'];
                    echo '<option>'.$titleLunch.'</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="DinnerDay1"><b>Dinner</b></label>
                <input type="hidden" name="DinnerDay1" value="dinnerDay1">
            </div>

            <label for="selectDinnerDay1">Select your dinner recipe</label>
            <select name="selectDinnerDay1">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                $titleDinner = $row['title'];
                echo '<option>'.$titleDinner.'</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group col-sm">
            <h2>Day two</h2>
            <input type="date" name="day2" class="form-control" id="day2" value=""><br>

            <div class="form-group">
                <label for="breakfastDay2"><b>Breakfast</b></label>
                <input type="hidden" name="breakfastDay2" value="breakfastDay2">
            </div>

            <label for="selectBreakfastDay2">Select your breakfast recipe</label>
            <select name="selectBreakfastDay2">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleBreakfast = $row['title'];
                    echo "<option>".$titleBreakfast."</option>";
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="lunchDay2"><b>Lunch</b></label>
                <input type="hidden" name="LunchDay2" value="lunchDay2">
            </div>

            <label for="selectLunchDay2">Select your lunch recipe</label>
            <select name="selectLunchDay2">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleLunch = $row['title'];
                    echo '<option>'.$titleLunch.'</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="DinnerDay2"><b>Dinner</b></label>
                <input type="hidden" name="DinnerDay2" value="dinnerDay2">
            </div>

            <label for="selectDinnerDay2">Select your dinner recipe</label>
            <select name="selectDinnerDay2">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleDinner = $row['title'];
                    echo '<option>'.$titleDinner.'</option>';
                }
                ?>
            </select><br><br>
        </div>

        <div class="form-group col-sm">
            <h2>Day three</h2>
            <input type="date" name="day3" class="form-control" id="day3" value=""><br>

            <div class="form-group">
                <label for="breakfastDay3"><b>Breakfast</b></label>
                <input type="hidden" name="breakfastDay3" value="breakfastDay3">
            </div>

            <label for="selectBreakfastDay3">Select your breakfast recipe</label>
            <select name="selectBreakfastDay3">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleBreakfast = $row['title'];
                    echo '<option>' . $titleBreakfast . '</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="lunchDay3"><b>Lunch</b></label>
                <input type="hidden" name="LunchDay3" value="lunchDay3">
            </div>

            <label for="selectLunchDay3">Select your lunch recipe</label>
            <select name="selectLunchDay3">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleLunch = $row['title'];
                    echo '<option>'.$titleLunch.'</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="DinnerDay3"><b>Dinner</b></label>
                <input type="hidden" name="DinnerDay3" value="dinnerDay3">
            </div>

            <label for="selectDinnerDay3">Select your dinner recipe</label>
            <select name="selectDinnerDay3">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleDinner = $row['title'];
                    echo '<option>'.$titleDinner.'</option>';
                }
                ?>
            </select><br><br>
        </div>

    <div class="form-group col-sm">
        <h2>Day four</h2>
        <input type="date" name="day4" class="form-control" id="day4" value=""><br>

        <div class="form-group">
            <label for="breakfastDay4"><b>Breakfast</b></label>
            <input type="hidden" name="breakfastDay4" value="breakfastDay4">
        </div>

        <label for="selectBreakfastDay4">Select your breakfast recipe</label>
        <select name="selectBreakfastDay4">
            <?php
            $query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                $titleBreakfast = $row['title'];
                echo '<option>' . $titleBreakfast . '</option>';
            }
            ?>
        </select><br><br>

        <div class="form-group">
            <label for="lunchDay4"><b>Lunch</b></label>
            <input type="hidden" name="LunchDay4" value="lunchDay4">
        </div>

        <label for="selectLunchDay4">Select your lunch recipe</label>
        <select name="selectLunchDay4">
            <?php
            $query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                $titleLunch = $row['title'];
                echo '<option>'.$titleLunch.'</option>';
            }
            ?>
        </select><br><br>

        <div class="form-group">
            <label for="DinnerDay4"><b>Dinner</b></label>
            <input type="hidden" name="DinnerDay4" value="dinnerDay4">
        </div>

        <label for="selectDinnerDay4">Select your dinner recipe</label>
        <select name="selectDinnerDay4">
            <?php
            $query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                $titleDinner = $row['title'];
                echo '<option>'.$titleDinner.'</option>';
            }
            ?>
        </select><br><br>

    </div>

        <div class="form-group col-sm">
            <h2>Day five</h2>
            <input type="date" name="day5" class="form-control" id="day5" value=""><br>

            <div class="form-group">
                <label for="breakfastDay5"><b>Breakfast</b></label>
                <input type="hidden" name="breakfastDay5" value="breakfastDay">
            </div>

            <label for="selectBreakfastDay5">Select your breakfast recipe</label>
            <select name="selectBreakfastDay5">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND breakfast = 1";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleBreakfast = $row['title'];
                    echo '<option>' . $titleBreakfast . '</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="lunchDay5"><b>Lunch</b></label>
                <input type="hidden" name="LunchDay5" value="lunchDay5">
            </div>

            <label for="selectLunchDay5">Select your lunch recipe</label>
            <select name="selectLunchDay5">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND lunch = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleLunch = $row['title'];
                    echo '<option>'.$titleLunch.'</option>';
                }
                ?>
            </select><br><br>

            <div class="form-group">
                <label for="DinnerDay5"><b>Dinner</b></label>
                <input type="hidden" name="DinnerDay5" value="dinnerDay5">
            </div>

            <label for="selectDinnerDay5">Select your dinner recipe</label>
            <select name="selectDinnerDay5">
                <?php
                $query = "SELECT * FROM `receptes` WHERE username = '$name' AND dinner = '1'";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $titleDinner = $row['title'];
                    echo '<option>'.$titleDinner.'</option>';
                }
                ?>
            </select>

        </div>


    </div>

<div class="row">
</div>



    <button type="submit" name="save" id="save" class="btn btn-warning">Save your meal plan</button>



</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="libs/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/ajax_load.js"></script>


</body>
</html>

