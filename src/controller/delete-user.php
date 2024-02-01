<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id !== false && $id > 0) {
        $sql = "DELETE FROM users WHERE id = $id";

        if ($database->query($sql)) {
            echo "<script>alert('User deleted successfuly'); </script>";
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
            header("Location: ../../public/view/admin/user-manager.php");

            
        } else {
            echo "<script>
            if (window.confirm('Error deleting User')) {
                window.history.go(-1);
            }
        </script>";    
        }
    } else {
        echo "<script>
        if (window.confirm('Invalid user ID')) {
            window.history.go(-1);
        }
    </script>"; 

    }

    $database->close();
} else {
    echo "Invalid request";
}
?>
