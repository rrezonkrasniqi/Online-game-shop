<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $name = $_POST['name'];
    $report = $_POST['report'];
    $email = $_POST['email'];


    $sql = "INSERT INTO contact (name, report, email) 
            VALUES ('$name', '$report', '$email')";

    if ($database->query($sql)) {
        echo "Report added successfully";
        header("Location: ../../public/view/contact-succes.php");

    } else {
        echo "Error: ";
        header("Location: ../../public/index.php");

    }

    $database->close();
}
?>