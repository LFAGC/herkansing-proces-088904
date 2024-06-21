<?php 
    require 'session.inc.php';
    require 'config.php';
    require 'apis.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    $userdata = mysqli_fetch_array($result);

    $sql = "SELECT * FROM photo WHERE user_id = $id";
    $result = mysqli_query($mysqli, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel van <?= $userdata['username'] ?></title>
</head>
<body>
    <h1 class="relative xl:m-12 m-8 mt-12 pt-10 xl:text-6xl text-3xl font-bold w-fit"><?= $userdata['username'] ?> zijn profiel pagina</h1>
    <?php if (!empty($result) && mysqli_fetch_array($result)) { ?>
        <h2 class="relative xl:m-12 mx-12 m-8 text-2xl font-bold w-fit">Jouw foto's:</h2>
        <div class="flex flex-wrap h-fit gap-1 m-12">
            <?php foreach($result as $photo) { ?>
                <div class="relative h-fit 2xl:w-[30%] w-full 2xl:base-[25%] xl:base-[45%] xl:w-[50%] p-[1rem] bg-[rgba(0,0,0,0.5)]">
                    <div class="flex float-right gap-2">
                        <div class="relative w-fit p-2 bg-[rgba(50,50,50,0.5)]">
                            <?php if ($photo['private'] == 0) { ?>
                                <a href="changePostVisibility.php?postid=<?= $photo['id'] ?>&type=<?= $photo['private'] ?>"><i class="fa-solid fa-eye"></i></a>
                            <?php } else { ?>
                                <a href="changePostVisibility.php?postid=<?= $photo['id'] ?>&type=<?= $photo['private'] ?>"><i class="fa-solid fa-eye-slash"></i></a>
                            <?php } ?>
                        </div>
                        <div class="relative w-fit p-2 bg-[rgba(50,50,50,0.5)]">
                        <a href="removePost.php?postid=<?= $photo['id'] ?>"><i class="fa-solid fa-dumpster"></i></a>
                        </div>
                    </div>
                    <p class="font-bold text-xl"><?= $photo['title'] ?></p>
                    <p class="my-3"><?= $photo['description'] ?></p>
                    <img class="relative w-full object-scale-down h-[15rem] bg-black" src="<?= $photo['path'] ?>" alt="<?= $photo['title'] ?>">
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h2 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-3xl w-fit">Je hebt nog geen foto's geupload! <a href="post.php" class="underline text-blue-400">Een posten ?</a></h2>
    <?php } ?>
</body>
</html>