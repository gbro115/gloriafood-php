<?php
require 'vendor/autoload.php';
require_once("src/GloriaFood/GloriaFood.php");

$authKey = "SOURCED_FROM_WEB_APP";

$api = new \GloriaFood\GloriaFood($authKey);
$result = $api->fetchMenu()->fetchMenu();
print_r($result);