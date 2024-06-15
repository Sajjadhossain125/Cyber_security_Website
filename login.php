<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Start a new session
            session_start();
            // Store user data in session variables
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Redirect to index.php
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cyber Security</title>

    <!-- ----------- Font Awesome ------------ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- GOOGLE FONTS (Titillium-Web) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700;900&display=swap" rel="stylesheet" />

    <!-- GOOGLE FONTS (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&family=Titillium+Web:wght@300;400;600;700;900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/login.css" />
</head>
<body>
    <!-- =========== START OF NAVBAR ============== -->
    <nav class="active">
        <div class="container nav_container">
            <a href="index.php"><h4>Cyber<span>Ez</span></h4></a>
            <div class="navbar">
                <ul class="nav_menu" id="nav_body">
                    <li><a class="navbar_link" href="index.php">Home</a></li>
                    <li><a class="navbar_link" href="courses.php">Courses</a></li>
                    <li><a class="navbar_link" href="contact-us.php">Contact Us</a></li>
                    <li><a class="navbar_link" href="ourmenu.php">Our Menu</a></li>
                    <li><a class="navbar_link login" href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="mobile_navbar_btn">
                <button class="mobile_navbar_icon" name="open">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <button class="mobile_navbar_icon" name="close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- ============= END OF NAVBAR ============== -->

    <!-- ============ Start of Login ============ -->
    <section class="login_page">
        <div class="container login_container">
            <article class="login_body">
                <div class="login_form">
                    <h2>Login</h2>
                    <form action="login.php" method="POST">
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" class="btn_primary">Login</button>
                    </form>
                    <p>Don't have an account? <a href="register.php" style="color: #33ccff;">Register</a></p>
                </div>
            </article>
        </div>
    </section>
    <!-- ============ End of Login ============ -->

    <!--  ================ START OF FOOTER ====================  -->
    <footer>
        <section class="container footer_container">
            <div class="vector-left2">
                <img src="./images/vector-left2.png" alt="vector" />
            </div>
            <div class="ellipse-left2"></div>
            <article class="left_footer">
                <a href="index.php"><h4>Cyber<span>Ez</span></h4></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet neque tortor.</p>
                <div class="socials">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </article>
            <article class="footer_quick-links item-center">
                <div>
                    <h6 class="footer_head">Quick Links</h6>
                    <ul class="quick-links">
                        <li><a href="#">Our Service</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Testimonial</a></li>
                    </ul>
                </div>
            </article>
            <article class="footer_contact-us">
                <h6 class="footer_head">Contact Us</h6>
                <div class="contact-site">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <a href="#">hello@website.com</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="#">838 Cantt Sialkot, ENG</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-phone"></i>
                        <a href="#">+02 5421234560</a>
                    </div>
                </div>
            </article>
            <article class="footer_newsletter">
                <h6 class="footer_head">Newsletter</h6>
                <div>
                    <input type="email" name="email" placeholder="Enter your email" />
                    <button class="subscribe">Subscribe</button>
                </div>
            </article>
        </section>
    </footer>
    <!--  ================ END OF FOOTER ====================  -->

    <script type="module" src="./js/main.js"></script>
    <script type="module" src="./js/login.js"></script>
</body>
</html>
