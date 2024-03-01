<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/User.php';
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
            $Id = $_GET['id'];


            $database= new Database();

            $sql = "SELECT * FROM users WHERE id = $Id";
            $result = $database->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
            ?>
                <form action="../../../src/controller/Edit-user.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $Id; ?>">

                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

                    <label for="birthday">Birthday:</label>
                    <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" required><br>

                    <label for="balance">Balance:</label>
                    <input type="number" name="balance" value="<?php echo $row['balance']; ?>" required><br>

                    <label for="role_id">Role:</label>
                    <select name="role_id" required>
                        <option value="1" <?php echo ($row['role_id'] == 1) ? 'selected' : ''; ?>>User</option>
                        <option value="2" <?php echo ($row['role_id'] == 2) ? 'selected' : ''; ?>>Admin</option>
                        <option value="3" <?php echo ($row['role_id'] == 3) ? 'selected' : ''; ?>>Journalist</option>
                    </select><br>






                    <input type="submit" value="Update">
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