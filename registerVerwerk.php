<?php

if (!$_POST['username'] || !$_POST['password']) {
    header('Location: login.php');
} else {
    require_once 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($mysqli, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        echo "Error: Gebruikers naam bestaat al!";
        echo "<br/><a href='register.php'>Ga terug</a>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertUserQuery = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
        $insertUserResult = mysqli_query($mysqli, $insertUserQuery);

        if ($insertUserResult) {
            session_start();
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
        } else {
            echo "Error: Fout bij het registreren!";
            echo "<br/><a href='register.php'>Ga terug</a>";
        }
    }

    mysqli_close($mysqli);
}