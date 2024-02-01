<?php
include_once('C:/xampp/htdocs/Online-game-shop/config/Database.php');

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST['email']);
    $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

    if ($database->query($sql) === TRUE) {
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    } else {
        echo "Error";
    }
}

$database->close();
?>