<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/Game.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
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
        <div>
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
            <?php
            $gameId = $_GET['id'];

      
            $database= new Database();

            $sql = "SELECT * FROM game WHERE game_id = $gameId";
            $result = $database->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
            ?>
<form action="../../../src/controller/Edit-Game.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $gameId; ?>">
                    
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" value="<?php echo $row['subject']; ?>" required><br>

                    <label for="description">Description:</label>
                    <textarea name="description" required rows="10"><?php echo $row['description']; ?></textarea><br>

                    <label for="release_date">Release Date:</label>
                    <input type="date" name="release_date" value="<?php echo $row['release_date']; ?>" required><br>

                    <label for="price">Price:</label>
                    <input type="number" name="price" value="<?php echo $row['price']; ?>" required><br>

                    <label for="platform">Platform:</label>
                    <input type="text" name="platform" value="<?php echo $row['platform']; ?>" required><br>

                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" value="<?php echo $row['rating']; ?>" required><br>

                    <label for="creator">Creator:</label>
                    <input type="text" name="creator" value="<?php echo $row['creator']; ?>" required><br>

                    <label for="image">Image:</label>
                    <input type="file" id="fileInput" name="image" accept="image/*" value="<?php echo $row['image']; ?>" ><br>
    

                    <input type="submit" value="Update Game">
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
