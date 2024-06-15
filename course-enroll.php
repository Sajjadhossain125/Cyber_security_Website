<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];

    $sql = "INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

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
    <link rel="stylesheet" href="./css/course-enroll.css" />
  </head>
  <body>
    <!-- =========== START OF NAVBAR ============== -->

    <nav class="active">
      <div class="container nav_container">
        <a href="index.php"
          ><h4>Cyber<span class="title">Ez</span></h4></a
        >
        <div class="navbar">
          <ul class="nav_menu" id="nav_body">
            <li>
              <a class="navbar_link" href="index.php">Home</a>
            </li>
            <li><a class="navbar_link" href="courses.php">Courses</a></li>
            <li>
              <a class="navbar_link" href="https://playfairciphertextproject.netlify.app/">Contact Us</a>
            </li>
            <li><a class="navbar_link" href="ourmenu.php">Cipher Play</a></li>
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

    <!-- =========== END OF NAVBAR ============== -->

    <!-- ============= Start of Course Registration form ================== -->
    <section class="enroll-form">
        <div class="container enroll-form_container">
            <article class="enroll-form_body">
                <div class="left_enroll">
                <marquee behavior="scroll" direction="left" scrollamount="10">
  <hr>
                Enroll in our top-rated cybersecurity courses today! <br> Learn from industry experts and enhance your skills with practical, hands-on training. Limited seats available - sign up now and secure your future in cybersecurity!
              <br>
              <hr>
  <img src="./images/wpe.jpg" alt="">
  <br>
  <img src="./images/soc.jpg" alt="">

  </marquee>

                </div>
                <div class="right_enroll">
                    <h5 class="form_title">Course Registration Form</h5>
                    <hr style="border: none; height: 1px; background-color: rgba(0, 255, 255, 0.61); margin: 1rem 0;" />
                    <form action="enroll.php" id="form" method="POST">
                        <h6>Personal Information *</h6>
                        <!-- Personal Information Inputs -->
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="name" name="name" placeholder=" " />
                                <label>Student Name *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="number" id="number" name="number" placeholder=" " />
                                <label>Mobile Number *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="email" id="email" name="email" placeholder=" " />
                                <label>Email Address *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="text" id="surname" name="surname" placeholder=" " />
                                <label>Facebook Name *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="present-address" name="present-address" placeholder=" " />
                                <label>Present Address *</label>
                                <p class="error"></p>
                            </div>
                            <div class="inside_grid">
                                <div class="input_parent">
                                    <input type="text" id="present-city" name="present-city" placeholder=" " />
                                    <label>Present City *</label>
                                    <p class="error"></p>
                                </div>
                                <div class="input_parent">
                                    <input type="text" id="postal-codeC" name="postal-codeC" placeholder=" " />
                                    <label>Postal Code</label>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="permanent-address" name="permanent-address" placeholder=" " />
                                <label>Permanent Address *</label>
                                <p class="error"></p>
                            </div>
                            <div class="inside_grid">
                                <div class="input_parent">
                                    <input type="text" id="city-name" name="city-name" placeholder=" " />
                                    <label>City Name *</label>
                                    <p class="error"></p>
                                </div>
                                <div class="input_parent">
                                    <input type="text" id="postal-code" name="postal-code" placeholder=" " />
                                    <label>Postal Code</label>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                        <!-- Date of Birth and Place of Birth Inputs -->
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="father" name="father" placeholder=" " />
                                <label>Father Name *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="date" id="birth-date" name="birth-date" placeholder=" " />
                                <label>Date of Birth *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="birth-place" name="birth-place" placeholder=" " />
                                <label>Place of Birth *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="text" id="father-cell" name="father-cell" placeholder=" " />
                                <label>Father Cell *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <!-- Martial Status and CNIC Inputs -->
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="cnic" name="cnic" placeholder=" " />
                                <label>CNIC/B.Form Number *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <select name="status" id="status">
                                    <option value="" selected disabled></option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>
                                <label>Martial Status *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <select name="district" id="district">
                                    <option value="" selected disabled></option>
                                    <option value="bagerhat">Bagerhat</option>
<option value="bandarban">Bandarban</option>
<option value="barguna">Barguna</option>
<option value="barisal">Barisal</option>
<option value="bhola">Bhola</option>
<option value="bogra">Bogra</option>
<option value="brahmanbaria">Brahmanbaria</option>
<option value="chandpur">Chandpur</option>
<option value="chittagong">Chittagong</option>
<option value="chuadanga">Chuadanga</option>
<option value="comilla">Comilla</option>
<option value="coxs_bazar">Cox's Bazar</option>
<option value="dhaka">Dhaka</option>
<option value="dinajpur">Dinajpur</option>
<option value="faridpur">Faridpur</option>
<option value="feni">Feni</option>
<option value="gaibandha">Gaibandha</option>
<option value="gazipur">Gazipur</option>
<option value="gopalganj">Gopalganj</option>
<option value="habiganj">Habiganj</option>
<option value="jaipurhat">Jaipurhat</option>
<option value="jamalpur">Jamalpur</option>
<option value="jessore">Jessore</option>
<option value="jhalakati">Jhalakati</option>
<option value="jhenaidah">Jhenaidah</option>
<option value="khagrachari">Khagrachari</option>
<option value="khulna">Khulna</option>
<option value="kishoreganj">Kishoreganj</option>
<option value="kurigram">Kurigram</option>
<option value="kushtia">Kushtia</option>
<option value="lakshmipur">Lakshmipur</option>
<option value="lalmonirhat">Lalmonirhat</option>
<option value="madaripur">Madaripur</option>
<option value="magura">Magura</option>
<option value="manikganj">Manikganj</option>
<option value="meherpur">Meherpur</option>
<option value="moulvibazar">Moulvibazar</option>
<option value="munshiganj">Munshiganj</option>
<option value="mymensingh">Mymensingh</option>
<option value="naogaon">Naogaon</option>
<option value="narail">Narail</option>
<option value="narayanganj">Narayanganj</option>
<option value="narsingdi">Narsingdi</option>
<option value="natore">Natore</option>
<option value="nawabganj">Nawabganj</option>
<option value="netrakona">Netrakona</option>
<option value="nilphamari">Nilphamari</option>
<option value="noakhali">Noakhali</option>
<option value="pabna">Pabna</option>
<option value="panchagarh">Panchagarh</option>
<option value="parbattya_chattagram">Parbattya Chattagram</option>
<option value="patuakhali">Patuakhali</option>
<option value="pirojpur">Pirojpur</option>
<option value="rajbari">Rajbari</option>
<option value="rajshahi">Rajshahi</option>
<option value="rangpur">Rangpur</option>
<option value="satkhira">Satkhira</option>
<option value="shariatpur">Shariatpur</option>
<option value="sherpur">Sherpur</option>
<option value="sirajganj">Sirajganj</option>
<option value="sunamganj">Sunamganj</option>
<option value="sylhet">Sylhet</option>
<option value="tangail">Tangail</option>
<option value="thakurgaon">Thakurgaon</option>

                                </select>
                                <label>District *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <select name="gender" id="gender">
                                    <option value="" selected disabled></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <label>Gender *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <h6>Academic Details *</h6>
                        <!-- Academic Details Inputs -->
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="degree" name="degree" placeholder=" " />
                                <label>Last Degree *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="text" id="major-subject" name="major-subject" placeholder=" " />
                                <label>Major Subject *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="college-name" name="college-name" placeholder=" " />
                                <label>Last College/University *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="date" id="degree-passing-date" name="degree-passing-date" placeholder=" " />
                                <label>Last Degree Passing Year *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <select name="employment-status" id="employment-status">
                                    <option value="" selected disabled></option>
                                    <option value="employed">Employed</option>
                                    <option value="unemployed">Unemployed</option>
                                </select>
                                <label>Employment Status *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <h6>Previous Institution (School/College) *</h6>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <input type="text" id="institution-name" name="institution-name" placeholder=" " />
                                <label>Institution Name *</label>
                                <p class="error"></p>
                            </div>
                            <div class="input_parent">
                                <input type="text" id="institution-year" name="institution-year" placeholder=" " />
                                <label>Passing Year *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <h6>Course Details</h6>
                        <div class="inputs_parent">
                            <div class="input_parent">
                                <select name="course" id="course">
                                    <option value="" selected disabled></option>
                                    <option value="course1">Course 1</option>
                                    <option value="course2">Course 2</option>
                                </select>
                                <label>Select Course *</label>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn_primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="success_message" class="success_message">
            &#10004; Course registration form successfully fulfill!
          </div>
            </article>
        </div>
    </section>
    <!-- ============= End of Course Registration form ================== -->

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
    <script type="module" src="./js/course-enroll.js"></script>
  </body>
</html>
