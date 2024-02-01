<?php
if (isset($_POST["submit"])) {
    $token = $_POST["token"];
    $tokenHash = hash("sha256", $token);

    $conn = new mysqli("localhost", "root", "", "shop");

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tokenHash);
    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if ($user === null) {
        die("Token not found");
    }

    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("Token has expired");
    }

    $newPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "UPDATE users
            SET password = ?,
            reset_token_hash = null,
            reset_token_expires_at = null
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $user["id"]);

    if ($stmt->execute()) {
        header("Location: password-success.php");
        exit();
    } else {
        die("Password reset failed");
    }
}
?>
