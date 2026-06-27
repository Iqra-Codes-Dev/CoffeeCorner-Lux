<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $qty = intval($_POST['qty']);

    if ($qty > 0) {
        $_SESSION['cart'][$id] = $qty; 
    } else {
        unset($_SESSION['cart'][$id]);
    }
}
header("Location: cart.php");
exit;
?>