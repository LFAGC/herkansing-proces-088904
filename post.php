<?php 
    require 'session.inc.php';
    require 'config.php';

    require 'apis.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Posten</title>
</head>
<body>
    <form action="postVerwerk.php" method="post" style="position: absolute; width: 70%; height: 70%; transform: translate(-50%, -50%); left: 50%; top: 50%;" enctype="multipart/form-data">
        <h2 class="relative my-8 text-4xl font-bold w-fit">Foto Posten</h2>
        <label for="username">Titel</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="password">Beschrijving</label>
        <input type="text" name="description" id="description" required>
        <br>
        <label for="checkbox">Openbaar</label>
        <input type="checkbox" name="checkbox" id="checkbox">
        <br>
        <br>
        <input type="file" name="imagefile" id="imagefile" required>
        <br>
        <br>
        <input type="submit" name="send" value="Posten">
    </form>
</body>
</html>