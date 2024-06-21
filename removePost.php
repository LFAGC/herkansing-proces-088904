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
        if (isset($_GET['postid'])) {
            $sql = "DELETE FROM photo WHERE id = $postid AND user_id = $id";
            $result = mysqli_query($mysqli, $sql);

            unlink('./uploads/'.$id.'-'.$postid.'.png');

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
}