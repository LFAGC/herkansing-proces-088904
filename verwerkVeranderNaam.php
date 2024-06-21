<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'session.inc.php';
    require 'config.php';

    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $oldUsername = $_POST['oldusername'];

    $checkquery = "SELECT username FROM user WHERE id = '$id'";
    $checkresult = mysqli_query($mysqli, $checkquery);
    $checkdata = mysqli_fetch_array($checkresult);

    echo $checkdata['username'];

    if ($checkdata['username'] == $oldUsername) {
        $sql = "UPDATE user SET username = '$username' WHERE id = $id";

        $result = mysqli_query($mysqli, $sql);
    
        if ($result) {
            header('Location: settings.php');
        } else {
            echo 'Failed!';
        }
    }
}