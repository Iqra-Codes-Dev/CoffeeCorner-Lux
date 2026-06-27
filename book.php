<?php session_start(); ?>
<?php
include "lec.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product page with css</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style6.css">
    <link rel="stylesheet" href="style12.css">
</head>
<!-- Custom Cursor -->
<div class="main-cursor"></div>
<section id="home">
    <body class="mx-5">
        <br><br><br>
        <main>
            <div class="product-details container-fluid position-relative p-5">
                <div class="background position-absolute h-75 w-100 rounded-5"></div>

                <div class="product-main mx-auto rounded-5 p-5" data-aos="slide-up" data-aos-duration="1000">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="row align-items-center">

                                <div class="col-lg-4 mb-5 mb-lg-0">
                                    <div class="sides d-flex flex-column pt-4">
                                        <h2 class="fw-bold mb-3">Good Morning, Coffee Lover!</h2>
                                        <p class="mb-3">
                                            Start your day with a cup of joy — every sip awakens your senses and fuels your
                                            passion.
                                        </p>
                                        <a href="#menu" class="price1 border-0 py-2 px-4 rounded-pill w-50">
                                            Order Now
                                        </a>

                                    </div>
                                </div>

                                <div class="col-lg-8 my-4">
                                    <div
                                        class="product-img-box ms-auto d-flex flex-column align-items-center justify-content-center">
                                        <div class="image-box text-center">
                                            <img src="uploads/o.png" alt="product" class="img-fluid"
                                                style="max-height: 200px;">
                                        </div>
                                        <div class="price mt-2">
                                            <h3 class="fw-bold m-0">$239.00</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            </div>
            </div>
        </main>
        <br><br>
        <hr class="center-hr" />
        <br><br>
</section>

<!-- Menu Section -->
<?php
include 'db.php';

// Fetch all categories
$result = mysqli_query($conn, "SELECT * FROM category ORDER BY id DESC");
?>

<section id="menu" class="menu container">
    <h2 class="section-title">Our Menu</h2>
    <div class="menu-grid">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="menu-item">

                <!-- IMAGE -->
                <img src="/Project/ec/uploads/<?php echo $row['image']; ?>">


                <!-- TITLE -->
                <h3><?php echo $row['title']; ?></h3>

                <!-- DESCRIPTION -->
                <p><?php echo $row['description']; ?></p>

                <!-- BUTTON LINK -->
                <a href="list.php?cat_id=<?php echo $row['id']; ?>" class="price1">
                    <i class="fa-solid fa-eye"></i> List Flavours
                </a>
            </div>
        <?php } ?>

    </div>
</section>




<hr class="center-hr" />
<!-- about-section  -->
<section class="about-section" id="about">
    <div class="coffee-image">
        <img src="uploads/o.png" alt="Coffee Cup">
    </div>
    <div class="about-text">
        <h2>ABOUT US</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Exerciationem voluptas enim harum eaque vero mollitia repellendus culpa, voluptatem consequatur debitis fugiat. Tenetur assumenda, quibusdam ratione esse molestias adipisci numquam ut! Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto obcaecati expedita maxime veniam neque tempora ipsum totam perspiciatis nisi! Sequi, eligendi. Magni accusamus eum aliquam velit obcaecati iusto possimus natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ea fugiat deleniti modi molestias aut totam quo aspernatur reprehenderit odit est voluptas eaque, necessitatibus animi pariatur esse mollitia recusandae atque.</p>
        <button class="price1">Read More!</button>
    </div>
</section>
<hr class="center-hr" />


<section class="g1" id="contact">
    <form class="contact-form" id="form">
        <h1 class="sub1">Contact Us</h1>
        <input type="text" name="user_name" placeholder="Your Name" required />
        <input type="email" name="user_email" placeholder="Your Email" required />
        <input type="text" name="user_address" placeholder="Your Address" />
        <input type="text" name="user_phone" placeholder="Your Number" />
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" id="submitBtn">Send Message</button>
        <p id="statusMessage" style="text-align: center; margin-top: 10px; font-weight: bold;"></p>
    </form>
</section>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script type="text/javascript">
    (function() {
        // Aapki Public Key sahi hai
        emailjs.init({
            publicKey: "OnNOJI0DPhENTERJY",
        });
    })();

    const btn = document.getElementById('submitBtn');
    const statusTxt = document.getElementById('statusMessage');

    document.getElementById("form").addEventListener("submit", function(e) {
        e.preventDefault();

        btn.innerText = 'Sending...';
        btn.disabled = true;

        // Aapka Service ID aur Template ID
        emailjs.sendForm("service_6pl0hm6", "template_ywzzplf", "#form")
            .then((response) => {
                btn.innerText = 'Send Message';
                btn.disabled = false;
                statusTxt.style.color = "green";
                statusTxt.innerText = " Email Sent Successfully!";
                this.reset(); // Form clear kar dega
            }, (error) => {
                btn.innerText = 'Send Message';
                btn.disabled = false;
                statusTxt.style.color = "red";
                statusTxt.innerText = "Failed to send email.";
                console.log("EmailJS Error:", error);
            });
    });
</script>
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

<script src="lec.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>