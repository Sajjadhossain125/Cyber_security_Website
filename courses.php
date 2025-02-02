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
    <link rel="stylesheet" href="./css/courses.css" />
</head>
<body>
    <!-- =========== START OF NAVBAR ============== -->
    <!-- <div class="vector1"><img src="./images/vector1.png" alt="vector" /></div> -->
    <div class="ellipse1"></div>

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
            <li><a class="navbar_link" href="https://playfairciphertextproject.netlify.app/">Cipher Play</a></li>
            
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

    

    <!-- ============= Start of Upper section ============== -->
    <section class="page_title">
      <div class="image_overlay">
        <article class="container animated_title">
          <p class="breadcrumbs">
            <a class="link" href="index.php"
              ><i class="fa-solid fa-house"></i> Home</a
            >
            > Courses
          </p>
          <h2>Courses</h2>
          <p>Courses that help beginner designers become true unicorns.</p>
          <span class="grad"></span>
          <div class="flex_search">
            <p class="result">Showing 1-8 of 12 results</p>
            <!-- <div class="filter_div">
              <input type="search" name="search" id="search" />
              <i class="fa-solid fa-magnifying-glass"></i>
              <button>Filter</button>
            </div> -->
          </div>
        </article>
      </div>
    </section>

    <!-- ============= End of Upper section ============== -->

    <!-- ============== START OF COURSES ===================== -->
    <section class="courses">
      <div class="container courses_container">


      </div>
    </section>
    <!-- ============== END OF COURSES ===================== -->

    <!--  ================ START OF FOOTER ====================  -->
    <footer>
      <section class="container footer_container">
        <div class="vector-left2">
          <img src="./images/vector-left2.png" alt="vector" />
        </div>
        <div class="ellipse-left2"></div>
        <article class="left_footer">
          <a href="index.php"
            ><h5>Cyber<span>Ez</span></h5></a
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
     <!-- 
   <script type="module" src="./js/courses.js"></script>
    

   ================ END OF FOOTER ====================  -->
   <script type="module" src="./js/courses.js"></script>
   <script type="module" src="./js/course-details.js"></script>
        

</body>
</html>
