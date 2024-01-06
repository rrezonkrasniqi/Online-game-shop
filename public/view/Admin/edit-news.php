<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/News.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/game.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/admin.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/login.css">
</head>

<body>
<?php include('../navbar.php'); ?>

    <div class="main-container">
        <div>
        <?php

        if(!isset($_SESSION["user"]))
        {
            header("Location: ../../index.php");
            exit(); 
            return;
        }
        
        if ($_SESSION["user"]["role"] != 2) {
            header("Location: ../../index.php");
            exit();
        }

        $name = $_SESSION["user"]["name"];
        echo "<h1>Welcome $name</h1>";

        ?>
            <?php
            $newsId = $_GET['id'];
            $database = new Database("127.0.0.1", "root", "", "shop");
            $sql = "SELECT * FROM news WHERE news_id = $newsId";
            $result = $database->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
            ?>
                <form action="../../../src/controller/Edit-news.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $newsId; ?>">
                    
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>

                    <label for="date">News Date:</label>
                    <input type="date" name="date" value="<?php echo $row['news_date']; ?>" required><br>

                    <label for="journalist-id">Description:</label>
                    <input type="number" name="journalist-id" value="<?php echo $row['journalist_user_id']; ?>" required><br>

                    <label for="text">Text:</label>
                    <textarea name="text" required rows="25"><?php echo $row['news_text']; ?></textarea><br>
                    
                    <label for="image">Image:</label>
                    <input type="text" name="image" value="<?php echo $row['image']; ?>" required><br>

                    <!-- The code downbelow must be removed-->
                    <label for="image-old">Image old:</label>
                    <input type="text" name="image-old" value="<?php echo $row['newsImage']; ?>" required><br>

                    <label for="short-dcs">Image:</label>
                    <input type="text" name="short-dcs" value="<?php echo $row['newsShortDesc']; ?>" required><br>

                    <input type="submit" value="Update News">
                </form>
            <?php
            } else {
                echo "Error retrieving game data.";
            }

            $database->close();
            ?>
        </div>
    </div>

</body>

</html>
