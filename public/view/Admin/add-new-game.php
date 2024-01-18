
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
<form action="../../../src/controller/Add_Game.php" method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="name" required><br>

                <label for="subject">Subject:</label>
                <input type="text" name="subject" required><br>

                <label for="description">Description:</label>
                <textarea name="description" required rows="10"></textarea><br>

                <label for="release_date">Release Date:</label>
                <input type="date" name="release_date" required><br>

                <label for="price">Price:</label>
                <input type="number" name="price" required><br>

                <label for="platform">Platform:</label>
                <input type="text" name="platform" required><br>

                <label for="rating">Rating:</label>
                <input type="number" name="rating" required><br>

                <label for="creator">Creator:</label>
                <input type="text" name="creator" required><br>

                <label for="image">Image:</label>
                <input type="file" id="fileInput" name="image" accept="image/*">

                <input type="submit" value="Add Game">
            </form>
        </div>
    </div>
    
</body>

</html>
