<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/Game.php';
?>

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
    <link rel="stylesheet" href="/Online-game-shop/public/css/login.css">

</head>

<body>
<?php include('../navbar.php'); ?>

    <div class="main-container">   <?php

    if (isset($_SESSION["user"])) {

        if ($_SESSION["user"]["role"] != 2) {
            header("Location: ../../index.php");
            exit();
        }
    } else {
        header("Location: ../../index.php");
        exit();
    }
    ?>
        <div class="title-container">
            <h1>Manage games</h1>
            <div>
                <a href="/Online-game-shop/public/view/Admin/add-new-game.php" class="custom-button">Add new game</a>
            </div>
        </div>
        <?php
        $database = new Database("127.0.0.1", "root", "", "shop");

        $sql = "SELECT * FROM Game";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
                $game->displayCRUD();
            }
        } else {
            echo "No games found in the database.";
        }

        $database->close();
        ?>
    </div>

</body>

</html>