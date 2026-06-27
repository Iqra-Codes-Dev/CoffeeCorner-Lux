<?php
session_start();

if (isset($_POST['flavour_id'])) {
    $id = $_POST['flavour_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check karein ke kya item pehle se cart mein hai
    if (isset($_SESSION['cart'][$id])) {
        echo "already_exists"; 
    } else {
        $_SESSION['cart'][$id] = 1; 
        echo array_sum($_SESSION['cart']); 
    }
}
?>