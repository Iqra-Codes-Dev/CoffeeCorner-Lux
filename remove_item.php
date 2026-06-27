<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
}
// Cart page par msg parameter ke sath bhej rahe hain
header("Location: cart.php?msg=removed");
exit;
?>