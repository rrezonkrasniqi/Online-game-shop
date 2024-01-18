<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
    } else {
        echo "Please select an image file.";
    }
    $database = new Database("127.0.0.1", "root", "", "shop");

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $rating = $_POST['rating'];
    $creator = $_POST['creator'];

    $targetDir = "../uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $fileNameWithUrl="http://localhost/Online-game-shop/src/uploads/".$fileName;
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO game (name, subject, description, release_date, price, platform, rating, creator, image) 
                    VALUES ('$name', '$subject', '$description', '$release_date', '$price', '$platform', '$rating', '$creator', ' $fileNameWithUrl')";

            if ($database->query($sql)) {
                echo "Game added successfully";
            } else {
                echo "Error";
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "Invalid file type. Allowed types: jpg, jpeg, png, gif";
    }

    $database->close();
}
?>
