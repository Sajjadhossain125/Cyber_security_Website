<?php
  include_once "./libs/utils.php";
  $user = auth();
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
    <link rel="stylesheet" href="./css/contact-us.css" />
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
            <li><a class="navbar_link" href="https://playfairciphertextproject.netlify.app/">Our Menu</a></li>
            
            <li style="display: <?php echo !isset($user["id"])?"block":'none'  ?>">
              <a class="navbar_link login" href="login.php">Login</a>
            </li>
            <div class="user_profile"  style="display: <?php echo isset($user["id"])?"block":'none'  ?>">
              <div class="user_avatar" id="profileBtn">
                <img src="./images/avatar.jpg" alt="Avatar" class="abatar" />
              </div>
              <div class="toggle_menu" id="menu" style="display:none">
                <p><?php echo  $user["username"] ?></p>
                <?php 
                  if($_SERVER["REQUEST_METHOD"]=="POST"){
                    logOut();
                  }
                ?>
                <form method="POST" >
                  <button type="submit">Logout</button>
                </form>
              </div>
            </div>
          </ul>
        </div>

        <script>
        $(document).ready(function() {
          $("#profileBtn").click(function() {
              console.log($("#menu"))
                $("#menu").slideToggle();
            });
        });
    </script>
        
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

    <!-- ============ Upper Page Title and Image Overlay ============== -->
    <section class="page_title">
      <div class="image_overlay">
        <article class="container contact-us_title">
          <div class="contact-us_title_body">
            <p class="breadcrumbs">
              <a class="link" href="index.php"
                ><i class="fa-solid fa-house"></i> Home</a
              >
              > Contact-us
            </p>
            <div>
              <p class="contact-us_heading">Contact Us</p>
              <span></span>
            </div>
            <h2>CyberEz Course Contact can join with us.</h2>
            <span class="grad"></span>
          </div>
        </article>
      </div>
    </section>

    <!-- ============ End of Upper Page Title and Image Overlay ============== -->

    <!-- ============ Start of Contact Us Content ================= -->
    <section class="contact-us">
      <div class="container contact-us_container">
        <article class="contact-us_details">
          <div class="phone_number">
            <span><i class="fa-solid fa-phone"></i></span>
            <h5>Contact Phone Number</h5>
            <a href="#"><p>+880 1908064229</p></a>
            <a href="#"><p>+880 1576400074</p></a>
          </div>
          <div class="email_address">
            <span><i class="fa-regular fa-envelope"></i></span>
            <h5>Our Email Address</h5>
            <a href="#"><p>sajjadkhan1647315@gamil.com</p></a>
            <a href="#"><p>hasibur01631753881@gmail.com</p></a>
          </div>
          <div class="location">
            <span><i class="fa-solid fa-location-dot"></i></span>
            <h5>Our Location</h5>
            <p>105 Baridhara J-Block, Main Road, Gulshan, Dhaka-1212</p>
          </div>
        </article>
        <article class="contact-us_form">
          <div class="form_image">
            <img
              src="https://media.istockphoto.com/id/685850190/photo/stock-market-concepts.jpg?s=612x612&w=0&k=20&c=ConXmau6pfXWz8ikfdGv2JiBHIvs9Dxwhr_kxDsWyMQ="
              alt="Form Image"
            />
          </div>
          <form action="contact-us-insert.php" id="form" method="POST">
            <p class="form_heading">Education For Everyone</p>
            <h5>Contact Us</h5>
            <p>Get a Free Course You Can Contact With us</p>
            <div class="form_info">
              <div class="input_control">
                <input type="text" name="name" id="name" placeholder="Name" />
                <label class="error"></label>
              </div>
              <div class="input_control">
                <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Email"
                />
                <label class="error"></label>
              </div>
              <div class="input_control">
                <input
                  type="text"
                  name="subject"
                  id="subject"
                  placeholder="Your Subject"
                />
                <label class="error"></label>
              </div>
              <div class="input_control">
                <textarea
                  placeholder="Message"
                  rows="6"
                  name="message"
                  id="message"
                ></textarea>
                <label class="error"></label>
              </div>
              <button class="btn_primary" type="submit">Get in Touch</button>
            </div>
          </form>
        </article>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.453172422622!2d90.42317154801884!3d23.80247924135554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7b0f0a41e45%3A0x6a7f337b6a377ca9!2sBaridhara%20J%20Block%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1712337760581!5m2!1sen!2sbd"
        width="100%"
        height="650"
        class="map"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </section>

    <!-- ============ End of Contact Us Content ================= -->

    <!--  ================ START OF FOOTER ====================  -->
    <footer>
      <section class="container footer_container">
        <div class="vector-left2">
          <img src="./images/vector-left2.png" alt="vector" />
        </div>
        <div class="ellipse-left2"></div>
        <article class="left_footer">
          <a href="index.php"
            ><h4>Cyber<span>82</span></h4></a
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
              <a href="#">admin@website.com</a>
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
  </body>
</html>
