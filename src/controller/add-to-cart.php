<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $productId = $_GET['id'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][] = $productId;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
