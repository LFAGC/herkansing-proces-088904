<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require 'session.inc.php';
    require 'config.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    $userdata = mysqli_fetch_array($result);

    $postid = $_GET['postid'];
    $type = $_GET['type'];

    $sql = "SELECT * FROM photo WHERE user_id = $id AND id = $postid";
    $result = mysqli_query($mysqli, $sql);

    $postdata = mysqli_fetch_array($result);

    if ($result && !empty($postdata)) {
        if (isset($_GET['postid']) && isset($_GET['type'])) {
            if ($type == 0) {
                $type = 1;
            } else {
                $type = 0;
            }

            $sql = "UPDATE photo SET private = $type WHERE id = $postid";
            $result = mysqli_query($mysqli, $sql);

            if ($result) {
                header('Location: profile.php');
            } else {
                echo "FOUT: geen resultaat gevonden. <br>";
                echo "Error: . mysqli_error($mysqli). <br/>";
            }
        }
    } else {
        echo "FOUT: geen resultaat gevonden. <br>";
        echo "Error: . mysqli_error($mysqli). <br/>";
    }
} else {
    header('Location: profile.php');
}