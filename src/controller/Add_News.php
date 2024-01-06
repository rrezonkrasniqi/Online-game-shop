<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $newsTitle = $_POST['news-title'];
    $date = $_POST['news-date'];
    $jrUserID = $_POST['journalist_user_id'];
    $newsText = $_POST['news-text'];
    $image = $_POST['news-image'];
    $desc = $_POST['short-dsc'];

    $sql = "INSERT INTO news (title, news_date, journalist_user_id, news_text,image ,newsImage,newsShortDesc) 
            VALUES ('$newsTitle','$date','$jrUserID','$newsText','$image','$image','$desc')";

    $output = "";
    $database->query($sql) ? $output = "Game added successfully" : $output = "Error";
    echo $output;

    $database->close();
}
?>