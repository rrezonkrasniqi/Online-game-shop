<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/game.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/admin.css">
    <link rel="icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
</head>

<body>
<?php include('../navbar.php'); ?>

    <div class="main-container">
        <?php

        if (isset($_SESSION["user"])) {
       
            if ($_SESSION["user"]["role"] != 3) {
                header("Location: ../../index.php");
                exit();
            }

            $name = $_SESSION["user"]["name"];
            echo "<h1>Welcome $name</h1>";
        } else {
            header("Location: ../../index.php");
            exit(); 
        }
        ?>

        <div class="options">
            <a href="../../index.php">
                <div class="option">
                    <h1>Go to main page</h1> <img src="../../images/next.svg" class="continue-icon" alt="">
                </div>
            </a>
            <a href="news-manager.php">
                <div class="option">
                    <h1>Manage News</h1> <img src="../../images/next.svg" class="continue-icon" alt="">
                </div>
            </a>
        </div>
    </div>
</body>

</html>
