<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/User.php';
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
    <div class="main-container">

<?php

        if (isset($_SESSION["user"])) {
       
            if ($_SESSION["user"]["role"] != 2) {
                header("Location: ../../index.php");
                exit();
            }

            $name = $_SESSION["user"]["name"];
            echo "<h1>Admin: $name</h1>";
        } else {
            header("Location: ../../index.php");
            exit(); 
        }
        ?>


<?php
       echo "<table>";
       echo "<tr>";
       echo "<th>ID</th>";
       echo "<th>Name</th>";
       echo "<th>Username</th>";
       echo "<th>Email</th>";
       echo "<th>Birthday</th>";
       echo "<th>Balance</th>";
       echo "<th>Role</th>";
       echo "<th>Action</th>";


       echo "</tr>";
                $database = new Database("127.0.0.1", "root", "", "shop");

                $sql = "SELECT * FROM users";
                $result = $database->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $user = new User($row['id'],$row['name'], $row['username'], $row['email'], $row['birthday'], $row['balance'], $row['role_id'],);
                        $user->displayUsers();
                    }
                } else {
                    echo "No Users found in the database.";
                }

                $database->close();
                ?></div>
</body>
</html>