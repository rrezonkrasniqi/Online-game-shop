<?php
session_start();

require_once("../../config/Database.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $db = new Database("127.0.0.1", "root", "", "shop");

    if ($db->query("SELECT 1") === FALSE) {
        die("Connection failed: ");
    }

    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $db->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Username or email already in use.";
    } else {
        $insertQuery = "INSERT INTO users (name, email, username, password, birthday) 
                        VALUES ('$name', '$email', '$username', '$hashedPassword', '$birthday')";

        if ($db->query($insertQuery)) {
            $roleQuery = "SELECT role_id FROM users WHERE username = '$username'";
            $roleResult = $db->query($roleQuery);

            if ($roleResult && $roleRow = $roleResult->fetch_assoc()) {
                $userRole = $roleRow["role_id"];

                $_SESSION["user"] = array(
                    "name" => $name,
                    "username" => $username,
                    "role" => $userRole
                );

                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Error retrieving user role.";
            }
        } else {
            echo "Error: ";
        }
    }

    $db->close();
}
?>
