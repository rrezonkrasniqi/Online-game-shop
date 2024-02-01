<?php
session_start();

session_destroy();

header("Location: ../../public/view/Authentication/login.php");
exit();
?>
