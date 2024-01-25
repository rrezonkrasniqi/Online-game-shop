<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $database = new Database();

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id !== false && $id > 0) {
        $sql = "DELETE FROM news WHERE news_id = $id";

        if ($database->query($sql)) {
            echo "Game deleted";
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
            header("Location: ../../public/view/admin/news-manager.php");

        } else {
            echo "Error deleting game"; 
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

        }
    } else {
        echo "Invalid news ID";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

    }

    $database->close();
} else {
    echo "Invalid request";
}
?>
