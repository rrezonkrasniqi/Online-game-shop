<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $journalistId = $_POST['journalist'];
    $text = $_POST['text'];
    $image = $_POST['image'];
    $imageOld = $_POST['image-old'];
    $shortDcs = $_POST['short-dcs'];

    $sql = "UPDATE news SET
            title = '$title',
            news_date = '$date',
            journalist_user_id = '$journalistId',
            news_text = '$text',
            image = '$image',
            newsImage = '$imageOld',
            newShortDesc = '$shortDcs'";

    if ($database->query($sql)) {
        echo "News updated successfully";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
        header("Location: ../../public/view/admin/news-manager.php");


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
