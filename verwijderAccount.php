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
    <title>Verwijder account</title>
</head>
<body>
    <div class="absolute flex flex-col gap-5 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-2">
        <p class="relative font-bold text-3xl">Weet je zeker dat je dit account wilt verwijderen</p>
        <div class="relative flex h-fit gap-2">
            <p class="relative p-4 text-center grow bg-[rgba(70,70,70,0.5)] rounded-xl cursor-pointer" onclick="sendDeletePost()">Ja</p>
            <a href="settings.php" class="relative p-4 text-center grow bg-[rgba(70,70,70,0.5)] rounded-xl">Nee</a>
        </div>
    </div>
</body>
<script>
    function sendDeletePost() {
        const xhttp = new XMLHttpRequest();

        xhttp.open("POST", "verwerkVerwijderAccount.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("deleting=true");

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = "logout.php";
            }
        }
    }
</script>
</html>

