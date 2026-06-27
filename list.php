<?php
include 'db.php';
include "lec.php";


// 1 Get category id from URL
if (!isset($_GET['cat_id'])) {
    echo "Category not specified!";
    exit;
}

$cat_id = intval($_GET['cat_id']); // sanitize input

// 2 Fetch category info
$cat_stmt = $conn->prepare("SELECT * FROM Category WHERE id = ?");
$cat_stmt->bind_param("i", $cat_id);
$cat_stmt->execute();
$cat_result = $cat_stmt->get_result();
$category = $cat_result->fetch_assoc();

if (!$category) {
    echo "Category not found!";
    exit;
}

// 3 Fetch flavours for this category
$flavour_stmt = $conn->prepare("SELECT * FROM Flavours WHERE category_id = ?");
$flavour_stmt->bind_param("i", $cat_id);
$flavour_stmt->execute();
$flavour_result = $flavour_stmt->get_result();

$flavours = [];
while ($row = $flavour_result->fetch_assoc()) {
    $flavours[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style12.css">
    <link rel="stylesheet" href="style6.css">
    <title><?= htmlspecialchars($category['title']) ?> Flavours</title>
</head>

<body>
    <div class="main-cursor"></div>
  
    <!--  -->
<br><br><br><br>
    <section id="menu" class="menu container">
        <h2 class="section-title"><?= htmlspecialchars($category['title']) ?> Flavours</h2>
        <div class="menu-grid">

            <?php if ($flavours): ?>
                <?php foreach ($flavours as $flavour): ?>
                    <div class="menu-item">
                        <?php if (!empty($flavour['image'])): ?>
                            <img src="uploads/<?= $flavour['image'] ?>"
                                data-aos="zoom-in-up"
                                data-aos-duration="1000"
                                data-aos-delay="500">
                        <?php endif; ?>

                        <h3><?= htmlspecialchars($flavour['flavour_name']) ?></h3>
                        <p><?= htmlspecialchars($flavour['description']) ?></p>
                        <br>
                        <span class="price">$<?= number_format($flavour['price'], 2) ?></span>
                        <br><br>
                        <button class="price1 add-to-cart-btn" data-id="<?= $flavour['id'] ?>">Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No flavours available for this category.</p>
            <?php endif; ?>

        </div>
   <hr class="center-hr" />
<!-- ================= Footer ================= -->
    <footer class="footer">
    <div class="social-icon g2">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
    <p class="d1">
        &copy; 2026 Iqra Shafiq. All rights reserved. | Designed & Built by Me
    </p>
</footer>
    <script>
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
                let flavourId = this.getAttribute('data-id');
                let formData = new FormData();
                formData.append('flavour_id', flavourId);

                fetch('add_to_cart.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data === "already_exists") {
                            alert("This item is already in your cart!");
                        } else {
                            alert("Added to cart successfully! Check please add to cart list.");

                            // Cart count update karein
                            let badge = document.querySelector('.mycard span');
                            if (badge) {
                                badge.innerText = data;
                            }
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>
    <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script type="text/javascript">
    (function() {
        emailjs.init({
            publicKey: "OnNOJI0DPhENTERJY",
        });
    })();

    document.getElementById("form").addEventListener("submit", function(e) {
        e.preventDefault();
        emailjs.sendForm("service_6pl0hm6", "template_ywzzplf", "#form").then(
            (response) => {
                alert("Email Send Successfully", response.status, response.text);
                this.reset();
            },
            (error) => {
                alert("Email not Send", error);
            }
        );
    });
</script>
    <script src="lec.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>