<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
    <form action="loginVerwerk.php" method="post" style="position: absolute; width: 70%; height: 70%; transform: translate(-50%, -50%); left: 50%; top: 50%;">
        <h2>Inloggen</h2>
        <label for="username">Gebruikersnaam</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="send" value="Inloggen">
        <a href="register.php">Registreer</a>
    </form>
</body>
</html>