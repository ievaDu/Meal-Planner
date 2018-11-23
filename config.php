<?php

session_start();

include "Facebook/autoload.php";


use Facebook\Facebook;

$FB = new \Facebook\Facebook([
    'app_id' => '345581969550855',
    'app_secret' => '8df7ed7c20d4530fd1e6626dac6d5c06',
    'default_graph_version' => 'v2.10'
]);

$helper = $FB->getRedirectLoginHelper();

?>