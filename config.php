<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db_hostname = 'localhost';
$db_username = '088904_avg';
$db_password = '3510Dppg_';
$db_database = '088904_proces2_avg-her';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "Error: . mysqli_connect_error(). <br/>";
    exit;
}