<?php
session_start();

include_once '../../config/Database.php';

if (isset($_SESSION["user"]["id"])) {
    $userId = $_SESSION["user"]["id"];

    $gameId = $_GET["id"];
    $database = new Database("127.0.0.1", "root", "", "shop");

    // Check if the user already owns the game
    $checkOwnershipSql = "SELECT * FROM owned_game WHERE user_id = $userId AND game_id = $gameId";
    $checkOwnershipResult = $database->query($checkOwnershipSql);

    if ($checkOwnershipResult !== false && $checkOwnershipResult->num_rows > 0) {
        echo "You already own this game.";
    } else {
        // User does not own the game, proceed with the purchase
        $priceSql = "SELECT price FROM game WHERE game_id = $gameId";
        $priceResult = $database->query($priceSql);

        if ($priceResult !== false) {
            $priceRow = $priceResult->fetch_assoc();
            $price = $priceRow['price'];

            if ($price !== null && $_SESSION["user"]["balance"] >= $price) {
                $_SESSION["user"]["balance"] -= $price;

                $updateBalanceSql = "UPDATE users SET balance = {$_SESSION["user"]["balance"]} WHERE id = $userId";
                $database->query($updateBalanceSql);

                $insertSql = "INSERT INTO owned_game (user_id, game_id) VALUES ($userId, $gameId)";
                $database->query($insertSql);

                header("Location: ../../public/view/buy-success.php");
                echo "Game purchased successfully!";
            } else {
                echo "Insufficient balance to buy the game or game not found.";
            }
        } else {
            echo "Error fetching game price.";
        }
    }

    $database->close();
} else {
    echo "User not logged in.";
}
?>
