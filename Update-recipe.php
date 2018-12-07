<?php
include "db.php";
include "session.php";

//*************************************************************************************************//
//Get info from the data base into the code

$title = $_GET['title'];

$query = "SELECT * FROM receptes WHERE title = '$title' AND username = '$name'";
$result = mysqli_query($link, $query);

while($row = mysqli_fetch_array($result)) {
    $title = $row['title'];
    $url = $row['url'];
    $ingredient = $row['ingredient'];
    $description = $row['description'];
    $tag = $row['tag'];
    $breakfastTick = $row['breakfast'];
    $lunchTick = $row['lunch'];
    $dinnerTick = $row['dinner'];
    $id = $row['id'];

    $breakfastChecked = " ";
    $lunchChecked = " ";
    $dinnerChecked = " ";
    echo '';
}

//Get the correct category from the data base checked in checkbox
$breakfastChecked = " ";
$lunchChecked = " ";
$dinnerChecked = " ";

if ($breakfastTick == 1){
    $breakfastChecked = "checked";
}
if ($lunchTick == 1) {
    $lunchChecked = "checked";
}
if ($dinnerTick == 1) {
    $dinnerChecked = "checked";
}

//*********************************************************************************************//
//Validate the form before updating recipe
$error="";
$message = '';
$finalError = '';

if(isset($_POST['update'])) {

    $title1 = mysqli_real_escape_string($link, $_POST['title']);
    $url1 = mysqli_real_escape_string($link, $_POST['url']);
    $ingredient1 = mysqli_real_escape_string($link, $_POST['ingredient']);
    $description1 = mysqli_real_escape_string($link, $_POST['description']);
    $tag1 = mysqli_real_escape_string($link, $_POST['tag']);
    $breakfastTick1 = '0';
    $lunchTick1 = '0';
    $dinnerTick1 = '0';

    if ($title == "") {
        $error = '<div class="alert alert-dark" role="alert">Please do not leave title field empty</div><br>';
    }
    if (isset($_POST['breakfast'])) {
        $breakfastTick1 = '1';
    }
    if (isset($_POST['lunch'])){
        $lunchTick1 = '1';
    }
    if (isset($_POST['dinner'])) {
        $dinnerTick1 = '1';
    }
    if((!isset($_POST['breakfast']))&& (!isset($_POST['lunch'])) && (!isset($_POST['dinner'])))
    {
        $error = '<div class="alert alert-dark" role="alert">Please tick if it is recipe for breakfast, lunch or dinner</div><br>';
    }

    if ($error=="") {
       $query = "UPDATE `receptes` SET `title`='$title1',`url`='$url1',`breakfast`='$breakfastTick1',`lunch`='$lunchTick1',`dinner`='$dinnerTick1',`ingredient`='$ingredient1',`description`='$description1',`tag`='$tag1' WHERE id=$id";
       $result = mysqli_query($link, $query);
        if(! $result ) {
            die('Could not update data: . '.mysqli_error($link));
        } else {
            $message = "<div class=\"alert alert-success\" role=\"alert\">Recipe updated successfully<br><br><a class=\"btn btn-success\" href=\"main.php\" role=\"button\">Back to the main page</a></div>";
            $title = '';
            $url = '';
            $ingredient = '';
            $description = '';
            $tag = '';
            $breakfastTick = $row['breakfast'];
            $lunchTick = $row['lunch'];
            $dinnerTick = $row['dinner'];
            $id = $row['id'];

            $breakfastChecked = " ";
            $lunchChecked = " ";
            $dinnerChecked = " ";
        }
       } else {
        $finalError = '<div class="alert alert-dark" role="alert">Please check again</div><br>';
    }


}

if(isset($_POST['delete'])) {

    $query = "DELETE FROM `receptes` WHERE id=$id LIMIT 1";
    $result = mysqli_query($link, $query);

    if(! $result ) {
        die('Could not delete data: . '.mysqli_error($link));
    } else {
        $message = "<div class=\"alert alert-success\" role=\"alert\">Recipe deleted successfully<br><br><a class=\"btn btn-success\" href=\"main.php\" role=\"button\">Back to the main page</a></div>";
        $title = '';
        $url = '';
        $ingredient = '';
        $description = '';
        $tag = '';
        $breakfastTick = $row['breakfast'];
        $lunchTick = $row['lunch'];
        $dinnerTick = $row['dinner'];
        $id = $row['id'];

        $breakfastChecked = " ";
        $lunchChecked = " ";
        $dinnerChecked = " ";
    }
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location:index.php");
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

    <title>Update recipe</title>
</head>
<body>

<?php
include "navbar.html";
?>

<span id="error"><?php echo $error . $message . $finalError?></span>
<br>

<h2>Update recipe</h2>
<br>



<form method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="<?=$title?>">
            <small id="title" class="form-text text-muted">
                Mandatory field
            </small>
        </div>

    </div>
    <div class="form-group">
        <label for="url">Source link (if applicable)</label>
        <input type="text" name="url" class="form-control" value="<?=$url?>" id="url" placeholder="E.g. https://www.incredibleegg.org/recipe/basic-french-omelet/">
    </div><br>
    <input hidden type="text" name="name" class="form-control" value="<?=$id?>" id="id">
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="breakfast" type="checkbox" id="breakfast" value="" <?=$breakfastChecked?>>
        <label class="form-check-label" for="breakfast">Breakfast</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="lunch" type="checkbox" id="lunch" value="" <?=$lunchChecked?>>
        <label class="form-check-label" for="lunch">Lunch</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" name="dinner" type="checkbox" id="dinner" value="" <?=$dinnerChecked?>>
        <label class="form-check-label" for="inlineCheckbox3">Dinner</label>
    </div>
    <small id="breakfast" class="form-text text-muted">
        Mandatory field
    </small>
    <br><br>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ingredients</label>
        <textarea class="form-control"  name="ingredient" value="" id="exampleFormControlTextarea1" placeholder="E.g., 3 eggs, 200ml milk" rows="3"><?php echo $ingredient?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" value=""  name="description" exampleFormControlTextarea1" rows="3"><?php echo $description?></textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Tag</label>
        <select name="tag" id="inputState" class="form-control">
            <option selected><?=$tag?></option>
            <option>Fish</option>
            <option>Meat</option>
        </select>
        </div>
    <br>


    <button type="submit" name="update" id="update" class="btn btn-primary">Submit changes</button><br><br><br>
    <button type="submit" id="delete" onclick="areYouSure()" name="delete" class="btn btn-danger">Delete recipe</button>
</form>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/recipe.js"></script>
</body>
</html>
