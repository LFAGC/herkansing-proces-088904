<?php 
    require 'session.inc.php';
    require 'config.php';
    require 'apis.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    $userdata = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verander Naam</title>
</head>
<body>
    <h1 class="relative xl:m-12 m-8 mt-12 pt-10 xl:text-6xl text-3xl font-bold w-fit">Verander je gebruikers naam</h1>
    <p class="relative xl:m-12 ml-12 xl:text-3xl text-xl font-bold w-fit">Huidige naam: <?= $userdata['username'] ?></p>

    <form action="verwerkVeranderNaam.php" method="post" style="position: absolute; width: 70%; height: 70%; transform: translate(-50%, -50%); left: 50%; top: 70%;">
        <label for="username">Nieuwe Gebruikersnaam</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Oude Gebruikersnaam</label>
        <input type="text" name="oldusername" id="oldusername" required>
        <br>
        <input type="submit" name="send" value="Veranderen">
    </form>
</body>
</html>