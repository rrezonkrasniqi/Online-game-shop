<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();

    $newsTitle = $_POST['news-title'];
    $date = $_POST['news-date'];
    $jrUserID = $_POST['journalist_user_id'];
    $newsText = $_POST['news-text'];
    $image = $_POST['news-image'];
    $desc = $_POST['short-dsc'];

    $sql = "INSERT INTO news (title, news_date, journalist_user_id, news_text, image, newsShortDesc) 
            VALUES ('$newsTitle', '$date', '$jrUserID', '$newsText', '$image', '$desc')";

    $output = "";
    if ($database->query($sql)) {
        $output = "News added successfully";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        $output = "Error";
    }

    echo $output;

    $database->close();
}
?>
