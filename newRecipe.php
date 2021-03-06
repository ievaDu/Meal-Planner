<?php

include "session.php";
include "db.php";

$error="";
$message='';

if(isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($link, $_POST['title']);
    $url = mysqli_real_escape_string($link, $_POST['url']);
    $ingredient = mysqli_real_escape_string($link, $_POST['ingredient']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $tag = mysqli_real_escape_string($link, $_POST['tag']);
    $breakfastTick = '0';
    $lunchTick = '0';
    $dinnerTick = '0';

    if ($title == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave title field empty</div><br>';
    }
    if (isset($_POST['breakfast'])) {
        $breakfastTick = '1';
    }
    if (isset($_POST['lunch'])){
        $lunchTick = '1';
    }
    if (isset($_POST['dinner'])) {
        $dinnerTick = '1';
    }

       /* if (isset($_POST['breakfast'])) {
            $breakfastTick = '1';
        } elseif (isset($_POST['lunch'])){
            $lunchTick = '1';
        } elseif (isset($_POST['dinner'])){
            $dinnerTick = '1';*/
     if((!isset($_POST['breakfast']))&& (!isset($_POST['lunch'])) && (!isset($_POST['dinner'])))
     {
        $error = '<div class="alert alert-dark" role="alert">Please tick if it is recipe for breakfast, lunch or dinner</div><br>';
    }

    if ($error) {
        echo "There are errors";}
        else {

        $query = "INSERT INTO `receptes` (`title` , `url` , `breakfast` , `lunch` , `dinner` , `ingredient` , `description` , `tag` , `username`) VALUES ('$title','$url','$breakfastTick','$lunchTick','$dinnerTick','$ingredient','$description','$tag','$name')";
        $result = mysqli_query($link, $query);
            if(! $result ) {
                die('Could not delete data: . '.mysqli_error($link));
            } else {
                $message = "<div class=\"alert alert-success\" role=\"alert\">Recipe added successfully<br><br><a class=\"btn btn-success\" href=\"main.php\" role=\"button\">Back to the main page</a></div>";
            }
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

    <title>New recipe</title>
</head>
<body>
<?php

include "navbar.html";
?>
<span id="error"><?php echo $error . $message ?></span>

<div class="col-lg-2">
</div>
<div class="col-lg-8">
<h2>New recipe</h2>
<br>



<form id="recipe" accept-charset="UTF-8" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="E.g. Omelette">
            <small id="title" class="form-text text-muted">
                Mandatory field
            </small>
        </div>

    </div>
    <div class="form-group">
        <label for="url">Source link (if applicable)</label>
        <input type="text" name="url" class="form-control" id="url" placeholder="E.g. https://www.incredibleegg.org/recipe/basic-french-omelet/">
    </div><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="breakfast" type="checkbox" id="breakfast" value="breakfast">
        <label class="form-check-label" for="breakfast">Breakfast</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="lunch" type="checkbox" id="lunch" value="lunch">
        <label class="form-check-label" for="lunch">Lunch</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="dinner" type="checkbox" id="dinner" value="dinner">
        <label class="form-check-label" for="inlineCheckbox3">Dinner</label>
    </div>
    <small id="breakfast" class="form-text text-muted">
        Mandatory field
    </small>
    <br><br>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ingredients and quantity</label>
        <textarea class="form-control" name="ingredient" id="exampleFormControlTextarea1" placeholder="E.g., 3 eggs, 200ml milk" rows="3"></textarea>
    </div>

    <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control"  name="description" exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Tag</label>
            <select name="tag" id="inputState" class="form-control">
                <option selected>Vegetarian</option>
                <option>Fish</option>
                <option>Meat</option>

            </select>
        </div>

    <button type="submit" name="submit" id="add" class="btn btn-primary">Add recipe</button>
</form><br>
</div>
<div class="col-lg-2">
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/recipe.js"></script>
</body>
</html>
