<?php
require_once '../../config/Database.php';
require_once '../../src/controller/Game.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/game.css">
    <script src="js/navbar.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <form action="" method="get">
        <div class="main-container search-container">
            <input type="text" name="search" id="searchInput" placeholder="Search for games" value="<?php echo $searchTerm; ?>" />
            <button type="submit" class="search-btn">Search</button>
        </div>
    </form>

    <div class="main-container">
        <div class="games-container">

            <?php
            $database = new Database();



            $sql = "SELECT * FROM game WHERE name LIKE '%$searchTerm%'";
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
                    $game->display();
                }
            } else {
                echo "No games found in the database.";
            }

            $database->close();
            ?>
        </div>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>
