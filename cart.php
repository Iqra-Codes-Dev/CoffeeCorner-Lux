<?php
session_start();
include 'db.php';


// Agar message show karwana ho
$message = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<?php
include "lec.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style12.css">
    <link rel="stylesheet" href="style6.css">
    <link rel="stylesheet" href="style8.css">
</head>

<body>
    <div class="main-cursor"></div>
   

    <div class="container py-5">
        <h2 class="text-center mb-5">Your Shopping Cart</h2>

        <?php if ($message == 'removed'): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Item removed from cart!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php
            if (!empty($_SESSION['cart'])) {
                $ids = implode(',', array_keys($_SESSION['cart']));
                $result = mysqli_query($conn, "SELECT * FROM Flavours WHERE id IN ($ids)");
                $total_bill = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $qty = $_SESSION['cart'][$id];
                    $subtotal = $row['price'] * $qty;
                    $total_bill += $subtotal;
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card cart-card h-100 shadow-sm">
                            <img src="uploads/<?= $row['image'] ?>" alt="product">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['flavour_name']) ?></h5>
                                <p class="text-muted small"><?= htmlspecialchars($row['description']) ?></p>
<h6 class="text-success fw-bold">
    Price: $<?= number_format($row['price'], 2) ?>
</h6>
                                <form action="update_cart.php" method="POST" class="d-flex align-items-center mb-3">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <span class="me-2">Qty:</span>
                                    <input type="number" name="qty" value="<?= $qty ?>" min="1" class="qty-input me-2">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Update</button>
                                </form>

                                <div class="d-flex justify-content-between align-items-center mt-3">
<span class="fw-bold text-success">
    Total: $<?= number_format($subtotal, 2) ?>
</span>                                    <a href="remove_item.php?id=<?= $id ?>" class="btn btn-sm btn-danger">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="col-12 mt-4 text-end">
<h5>
    Grand Total:
    <span class="text-primary">
        $<?= number_format($total_bill, 2) ?>
    </span>
</h5>                    <a href="checkout.php" class="btn btn-lg btn-warning px-6 rounded-pill fw-bold ">
                        Checkout Now
                    </a>
                </div>
            <?php
            } else {
                echo "<div class='text-center w-100'><h4>Your cart is empty!</h4><a href='book.php' class='btn btn-primary mt-3'>Go Back to Menu</a></div>";
            }
            ?>
        </div>
    </div>
    <script src="lec.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>