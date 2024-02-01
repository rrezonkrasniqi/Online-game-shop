<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $rating = $_POST['rating'];
    $creator = $_POST['creator'];

    $image = '';  

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $image = $targetFilePath;
            } else {
                echo "Error uploading file";
                echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
                exit;
            }
        } else {
            echo "Invalid file type. Allowed types: jpg, jpeg, png, gif";
            echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
            exit;
        }
    }

    $sql = "UPDATE game SET 
            name = '$name',
            subject = '$subject',
            description = '$description',
            release_date = '$release_date',
            price = '$price',
            platform = '$platform',
            rating = '$rating',
            creator = '$creator'";
    
    if (!empty($image)) {
        $sql .= ", image = '$image'";
    }

    $sql .= " WHERE game_id = $id";

    if ($database->query($sql)) {
        echo "Game updated successfully";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
        header("Location: ../../public/view/admin/game-manager.php");
    } else {
        echo "<script>
        if (window.confirm('Error updating game')) {
            window.history.go(-1);
        }
    </script>"; 
    }

    $database->close();
} else {
    echo "<script>
    if (window.confirm('Invalid request')) {
        window.history.go(-1);
    }
</script>"; 
}
?>
