<?php

session_start();
if(!isset($_SESSION['name'])){
    header("location:index.php");
}
$name = $_SESSION['name'];
header('Content-Type: text/html; charset=utf-8');


if(isset($_POST['logout'])){
    session_destroy();
    header("location:index.php");
}
