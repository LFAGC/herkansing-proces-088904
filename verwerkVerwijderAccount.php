<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'session.inc.php';
    require 'config.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id = $id";

    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        $photos = mysqli_query($mysqli, "SELECT * FROM photo WHERE user_id = $id");

        foreach ($photos as $photo) {
            $postid = $photo['id'];
            $sql = "DELETE FROM photo WHERE id = $postid AND user_id = $id";
            mysqli_query($mysqli, $sql);
            unlink($photo['path']);
        }
        
        $sql = "DELETE FROM user WHERE id = $id";
        mysqli_query($mysqli, $sql);
        session_destroy();
        header('Location: logout.php');
    } else {
        echo "Error deleting account: " . mysqli_error($mysqli);
    }
}