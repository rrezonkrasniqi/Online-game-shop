
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

    <div class="main-container">
        <div >
        <?php

        if (isset($_SESSION["user"])) {
       
            if ($_SESSION["user"]["role"] != 2) {
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
            <form action="../../../src/controller/Add_News.php" method="POST">
                <label for="news-title">Author:</label>
                <input type="text" name="news-title" required><br>

                <label for="news-date">Subject:</label>
                <input type="date" name="news-date" required><br>

                <label for="journalist_user_id">Subject:</label>
                <input type="text" name="journalist_user_id" required><br>

                <label for="news-text">Description:</label>
                <textarea name="news-text" required rows="25"></textarea><br>

                <label for="short-dsc">Subject:</label>
                <input type="text" name="short-dsc" required><br>

                <label for="news-image">Subject:</label>
                <input type="text" name="news-image" required><br>

                <input type="submit" value="Add News">
            </form>
        </div>
    </div>
    
</body>

</html>
