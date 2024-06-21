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
    <title>Instellingen van <?= $userdata['username'] ?></title>
</head>
<body>
    <h1 class="relative xl:m-12 m-8 mt-12 pt-10 xl:text-6xl text-3xl font-bold w-fit">Instellingen</h1>

    <div class="relative flex flex-col w-full min-h-screen w-full gap-2">
        <a href="verwijderAccount.php">
            <div class="relative flex flex-col mx-auto xl:w-[50%] w-[85%] rounded-md p-5 bg-[rgba(0,0,0,0.25)]">
                <p class="text-xl font-black">Verwijderen</p>
                <p class="text-md">Verwijderen van je account</p>
            </div>
        </a>
        <a href="veranderNaam.php">
            <div class="relative flex flex-col mx-auto xl:w-[50%] w-[85%] rounded-md p-5 bg-[rgba(0,0,0,0.25)]">
                <p class="text-xl font-black">Naam veranderen</p>
                <p class="text-md">Verander je account naam</p>
            </div>
        </a>
        <a href="accountExporteren.php">
            <div class="relative flex flex-col mx-auto xl:w-[50%] w-[85%] rounded-md p-5 bg-[rgba(0,0,0,0.25)]">
                <p class="text-xl font-black">Exporteer je account</p>
                <p class="text-md">Exporteer je account naar een .csv bestand</p>
            </div>
        </a>
    </div>
</body>
</html>