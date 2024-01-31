<?php
require_once '../../../config/Database.php';
require_once '../../../src/controller/Contact.php';
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
    <link rel="icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
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
        <?php
        $database= new Database();


        $sql = "SELECT * FROM contact";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $report = new Contact($row['report_id'], $row['name'], $row['report'], $row['email'],);
                $report->display();
            }
        } else {
            echo "No contacts found in the database.";
        }

        $database->close();
        ?>
    </div>

</body>

</html>