<?php
session_start();
include 'db.php';

if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

$total_bill = 0;
// Calculate total again for security
$ids = implode(',', array_keys($_SESSION['cart']));
$result = mysqli_query($conn, "SELECT * FROM Flavours WHERE id IN ($ids)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Coffee Corner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style9.css">
</head>
<body >

<div class="container" style="max-width: 900px;">
    <h2 class="text-center mb-4">Checkout & Delivery Details</h2>
    
    <div class="row">
        <div class="col-md-5 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Order</span>
                <span class="badge bg-secondary rounded-pill"><?= count($_SESSION['cart']) ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php 
                while ($row = mysqli_fetch_assoc($result)) { 
                    $qty = $_SESSION['cart'][$row['id']];
                    $subtotal = $row['price'] * $qty;
                    $total_bill += $subtotal;
                ?>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0"><?= $row['flavour_name'] ?> (x<?= $qty ?>)</h6>
                    </div>
                    <span class="text-muted">$<?= $subtotal ?></span>
                </li>
                <?php } ?>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <span>Total (USD)</span>
                    <strong>$<?= $total_bill ?></strong>
                </li>
            </ul>
        </div>

        <div class="col-md-7 order-md-1">
            <h4 class="mb-3">Shipping Address</h4>
            <form action="place_order.php" method="POST">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="customer_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="customer_phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Complete Address</label>
                    <textarea name="customer_address" class="form-control" rows="3" required></textarea>
                </div>
                <hr class="mb-4">
                <h4 class="mb-3">Payment Method</h4>
                <div class="form-check">
                    <input type="radio" name="payment_method" value="COD" class="form-check-input" checked>
                    <label class="form-check-label">Cash on Delivery (COD)</label>
                </div>
                
                <input type="hidden" name="total_amount" value="<?= $total_bill ?>">
                <button class="btn btn-primary btn-lg w-100 mt-4" type="submit">Place Order</button>
            </form>
        </div>
    </div>
</div>
<br><br><br>
</body>
</html>