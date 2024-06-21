<?php 
    require 'session.inc.php';
    require 'config.php';
    require 'apis.php';

    $sql = "SELECT * FROM photo WHERE private = 0";
    $result = mysqli_query($mysqli, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home pagina</title>
</head>
<body>
    <p class="relative xl:m-12 m-8 mt-12 pt-10 xl:text-6xl text-3xl font-bold w-fit">Welkom op de home pagina!</p>

    <div class="flex flex-wrap h-fit gap-1 m-10">
        <?php if (!empty($result)) { ?>
                <?php foreach($result as $photo) { ?>
                    <div class="relative flex flex-col gap-2 h-fit xl:w-[30%] xl:min-w-[30%] min-w-full xl:base-[25%] p-[1rem] bg-[rgba(0,0,0,0.5)]">
                        <p class="font-bold text-xl"><?= $photo['title'] ?></p>
                        <p><?= $photo['description'] ?></p>
                        <img class="relative w-full object-scale-down h-[15rem] bg-black" src="<?= $photo['path'] ?>" alt="<?= $photo['title'] ?>">
                    </div>
                <?php } ?>
        <?php } ?>
    </div>
</body>
</html>