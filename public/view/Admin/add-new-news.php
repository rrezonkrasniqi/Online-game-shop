
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
    <link rel="icon" href="http://3.138.55.27/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://3.138.55.27/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
</head>

<body>
<?php include('../navbar.php'); ?>

    <div class="main-container">
        <div >
        <?php

        if (isset($_SESSION["user"])) {
       
            if ($_SESSION["user"]["role"] != 2 && $_SESSION["user"]["role"] != 3) {
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
                <label for="news-title">Title</label>
                <input type="text" name="news-title" required><br>

                <label for="news-date">Date</label>
                <input type="date" name="news-date" required><br>

                <label for="journalist_user_id">Journalist</label>
<input type="text" name="journalist_user_id" value="<?php echo $_SESSION["user"]["id"]; ?>" readonly><br>

                <label for="news-text">Text</label>
                <textarea name="news-text" required rows="25"></textarea><br>

                <label for="short-dsc">Description:</label>
                <input type="text" name="short-dsc" required><br>

                <label for="news-image">Image URL:</label>
                <input type="text" name="news-image" required><br>

                <input type="submit" value="Add News">
            </form>
        </div>
    </div>
    
</body>

</html>
