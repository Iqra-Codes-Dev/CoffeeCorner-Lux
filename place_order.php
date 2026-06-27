<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SESSION['cart'])) {
    $name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    $address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $total = $_POST['total_amount'];
    
    // 1. Save Main Order
    $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, total_amount, status) 
            VALUES ('$name', '$email', '$phone', '$address', '$total', 'Pending')";
    
    if (mysqli_query($conn, $sql)) {
        // Clear Cart Session
        unset($_SESSION['cart']);
        
        // 2. Success Message
        echo "<script>
                alert('Order Placed Successfully! Thank you for shopping.');
                window.location.href = 'cart.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>