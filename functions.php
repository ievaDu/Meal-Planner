<?php


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