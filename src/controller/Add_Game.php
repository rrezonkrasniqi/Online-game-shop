<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $rating = $_POST['rating'];
    $creator = $_POST['creator'];
    $image = $_POST['image'];

    $sql = "INSERT INTO game (name, subject, description, release_date, price, platform, rating, creator, image) 
            VALUES ('$name', '$subject', '$description', '$release_date', '$price', '$platform', '$rating', '$creator', '$image')";

    if ($database->query($sql)) {
        echo "Game added successfully";
    } else {
        echo "Error: ";
    }

    $database->close();
}
?>