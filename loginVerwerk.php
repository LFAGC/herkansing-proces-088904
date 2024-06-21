<?php 

if (!$_POST['username'] || !$_POST['password']) {
    header('Location: login.php');
} else {
    require_once 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";

    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
        } else {
            echo "FOUT: wachtwoord is niet correct!";
            echo "<br/><a href='login.php'>Login</a>";
        }
    } else {
        echo "FOUT: gebruikersnaam is niet correct!";
        echo "<br/><a href='login.php'>Login</a>";
    }

    mysqli_close($mysqli);
}