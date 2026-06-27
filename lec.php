
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coffee Corner - Navbar</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Navbar Base */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;

    background-color: #FFEBC1;
    padding-top: 80px; 
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: #FFEBC1;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 20px 0;
}


/* Background Banner Section */
.background {
    left: 0;
    right: 0;
    top: 0;
    background-image: linear-gradient(to left, #43150A, #7A3B2E);
    z-index: -1;
}


.navbar-brand {
    color: #43150A;
    font-weight: 900;
    font-size: 1.3rem;
}

.navbar-brand i {
    margin-right: 5px;
}

.navbar-nav {
    flex: 1;
    justify-content: center;
}

.nav-link {
    color: #000;
    font-weight: 550;
    font-size: 18px;
    /* margin: 0 10px; */
    position: relative;
}

.nav-link::after {
    content: "";
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 2px;
    background: #43150A;
    transition: width 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
}

/* Sign In & Cart */
.nav-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.price1 {
    background: linear-gradient(135deg, #932f17, #43150A);
    color: #fff;
    border: none;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.price1:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.mycard {
    width: 40px;
    height: 40px;
    background-color: #eaaf71;
    display: grid;
    place-content: center;
    position: relative;
    border-radius: 50%;
    color: #531A0D;
}

.mycard i {
    font-size: 0.9rem;
}

.mycard span {
    width: 18px;
    height: 18px;
    right: -3px;
    top: -3px;
    display: grid;
    place-content: center;
    background-color: #d64c4c;
    color: #fff;
    font-size: 0.75rem;
    border-radius: 50%;
    position: absolute;
}

/* Responsive Navbar */
@media (max-width: 992px) {
    .navbar-nav {
        justify-content: flex-start;
        margin-top: 10px;
    }
    .nav-right {
        flex-direction: column;
        gap: 5px;
        margin-top: 10px;
    }
}

@media (max-width: 576px) {
    .nav-link {
        font-size: 14px;
        padding: 5px 0;
    }
    .price1 {
        width: 100%;
        font-size: 13px;
        padding: 6px 15px;
    }
    .mycard {
        width: 35px;
        height: 35px;
    }
    .mycard i {
        font-size: 0.8rem;
    }
    .mycard span {
        width: 16px;
        height: 16px;
        font-size: 0.7rem;
    }
}
</style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg container">
        <!-- Logo -->
        <a class="navbar-brand" href="#"><i class="fa-solid fa-mug-hot"></i> Coffee Corner</a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links & Right Side -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="nav-right ms-lg-3">
                <button class="price1">Sign In</button>
                <a href="cart.php" class="text-decoration-none">
                    <div class="mycard position-relative" style="background-color: #edc28a;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="" style="background-color: #d61919;" >
                            <?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </nav>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>























<?php
    // include 'db.php';
    // $result = mysqli_query($conn, "SELECT * FROM menus");
    ?>
<!-- 
    <section id="menu" class="menu container">
        <h2 class="section-title">Our Menu</h2>
        <div class="menu-grid">

            <?php 
            // while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                <div class="menu-item">
                    <img src="image\download.png<?
                    // php echo $row['image']; ?>
                    ">
                    <h3><?
                    // php echo $row['title']; 
                    ?></h3>
                    <p><?php
                    //  echo $row['description']; 
                     ?></p>
                    <span>$<?
                    // php echo $row['price']; 
                    ?></span>
                </div>
            <?php 
            // } 
            ?>

        </div>
    </section> -->
