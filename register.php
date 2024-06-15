<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if passwords match
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

    // Check if username or email already exists
    $checkSql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or Email already exists.'); window.history.back();</script>";
        $checkStmt->close();
        $conn->close();
        exit();
    }

    $checkStmt->close();

    // Insert the new user
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
      echo "<div class='notification success'>
              <i class='fas fa-check'></i>
              <p>Registration successful!</p>
              <script>
                  setTimeout(function(){
                      window.location.href = 'login.php';
                  }, 3000);
              </script>
            </div>";
  } else {
      echo "<div class='notification error'>
              <i class='fas fa-times'></i>
              <p>Error: " . $stmt->error . "</p>
            </div>";
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <!-- GOOGLE FONTS (Titillium-Web) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- GOOGLE FONTS (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&family=Titillium+Web:wght@300;400;600;700;900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/register.css" />
  </head>
  <body>
    <!-- =========== START OF NAVBAR ============== -->
    <nav class="active">
      <div class="container nav_container">
        <a href="index.php"
          ><h4>Cyber<span>Ez</span></h4></a
        >
        <div class="navbar">
          <ul class="nav_menu" id="nav_body">
            <li>
              <a class="navbar_link" href="index.php">Home</a>
            </li>
            <li><a class="navbar_link" href="courses.php">Courses</a></li>
            <li>
              <a class="navbar_link" href="contact-us.php">Contact Us</a>
            </li>
            <li><a class="navbar_link" href="ourmenu.php">Our Menu</a></li>
            <li>
              <a class="navbar_link login" href="login.php">Login</a>
            </li>
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

    <!-- ============ Start of Register ============ -->
    <section class="register">
        <div class="container register_container">
            <article class="register_body">
                <div class="register_form">
                    <h2>SignUp</h2>
                    <form action="register.php" method="POST">
                      <input type="text" name="username" placeholder="Username" required>
                      <input type="email" name="email" placeholder="Email" required>
                      <input type="password" name="password" placeholder="Password" required>
                      <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                      <button type="submit" class="btn_primary">Register</button>
                    </form>
                </div>
            </article>
        </div>
    </section>

    <!-- ============ End of Register ============ -->

    <!--  ================ START OF FOOTER ====================  -->
    <footer>
      <section class="container footer_container">
        <div class="vector-left2">
          <img src="./images/vector-left2.png" alt="vector" />
        </div>
        <div class="ellipse-left2"></div>
        <article class="left_footer">
          <a href="index.php"
            ><h4>Cyber<span>Ez</span></h4></a
          >
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit
            amet neque tortor.
          </p>
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
    <script type="module" src="./js/register.js"></script>
  </body>
</html>
