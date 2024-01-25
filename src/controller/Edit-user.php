<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username']; 
    $email = $_POST['email'];    
    $birthday = $_POST['birthday']; 
    $balance = $_POST['balance'];  
    $role_id = $_POST['role_id'];  
    

    $sql = "UPDATE users SET 
    name = '$name',
    username = '$username',  
    email = '$email',         
    birthday = '$birthday',
    balance = '$balance',
    role_id = '$role_id'
    WHERE id = $id";


    if ($database->query($sql)) {
        echo "User Data updated successfully";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
        header("Location: ../../public/view/admin/user-manager.php");


    } else {
        echo "<script>
        if (window.confirm('Error updating user')) {
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
