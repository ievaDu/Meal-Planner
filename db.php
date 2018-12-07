<?php

$link = mysqli_connect('localhost', 'root', '', 'mealplanner');

mysqli_query($link,"set names utf8");
mysqli_query($link,"set charset set utf8");

if(!$link) {
    die("Connection to database failed") . mysqli_connect_error();
}
