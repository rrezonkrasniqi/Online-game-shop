<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $rating = $_POST['rating'];
    $creator = $_POST['creator'];
    $image = $_POST['image'];

    $sql = "UPDATE game SET 
            name = '$name',
            subject = '$subject',
            description = '$description',
            release_date = '$release_date',
            price = '$price',
            platform = '$platform',
            rating = '$rating',
            creator = '$creator',
            image = '$image'
            WHERE game_id = $id";

    if ($database->query($sql)) {
        echo "Game updated successfully";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

    } else {
        echo "Error updating game";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

    }

    $database->close();
} else {
    echo "Invalid request";
    echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

}
?>
