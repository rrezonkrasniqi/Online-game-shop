<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id !== false && $id > 0) {
        $sql = "DELETE FROM users WHERE id = $id";

        if ($database->query($sql)) {
            echo "User deleted successfully";
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
            header("Location: ../../public/view/admin/user-manager.php");

            
        } else {
            echo "Error deleting User";
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

        }
    } else {
        echo "Invalid user ID";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';

    }

    $database->close();
} else {
    echo "Invalid request";
}
?>
