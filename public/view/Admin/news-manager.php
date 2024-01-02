<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/News.php';
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
            <h1>Manage News</h1>
            <div>
                <a href="/Online-game-shop/public/view/Admin/add-new-news.php" class="custom-button">Add news</a>
            </div>
        </div>
        <?php
        $database = new Database("127.0.0.1", "root", "", "shop");

        $sql = "SELECT * FROM news";
        $result = $database->query($sql);

        if($result->num_rows == 0)
        {
            echo "No news found";
            return;
        }

        while ($row = $result->fetch_assoc()) 
        {
            $news = new News($row['news_id'],$row['title'],$row['news_date'],$row['journalist_user_id'],$row['news_text'],$row['newsImage'],$row['newsShortDesc']);
            $news->displayNewsCRUD();
        }

        $database->close();
        ?>
    </div>

</body>

</html>