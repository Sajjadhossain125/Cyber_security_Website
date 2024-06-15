<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $surname = $_POST['surname'];
    $present_address = $_POST['present-address'];
    $present_city = $_POST['present-city'];
    $postal_codeC = $_POST['postal-codeC'];
    $permanent_address = $_POST['permanent-address'];
    $city_name = $_POST['city-name'];
    $postal_code = $_POST['postal-code'];
    $father = $_POST['father'];
    $birth_date = $_POST['birth-date'];
    $birth_place = $_POST['birth-place'];
    $father_cell = $_POST['father-cell'];
    $cnic = $_POST['cnic'];
    $status = $_POST['status'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $degree = $_POST['degree'];
    $major_subject = $_POST['major-subject'];
    $college_name = $_POST['college-name'];
    $degree_passing_date = $_POST['degree-passing-date'];
    $employment_status = $_POST['employment-status'];
    $institution_name = $_POST['institution-name'];
    $institution_year = $_POST['institution-year'];
    $course = $_POST['course'];



    $sql = "INSERT INTO enrollments (
        student_name,mobile_number,email_address,facebook_name,present_address,present_city,
        postal_codeC,permanent_address,city_name,postal_code,father_name,birth_date,
        birth_place,father_cell,cnic, marital_status,district,gender,last_degree,
        major_subject,college_name,degree_passing_year,employment_status,institution_name,
        institution_year,course) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssssssssssssssssssssssssss", 
        $name,$number,$email,$surname,$present_address,$present_city, 
        $postal_codeC,$permanent_address,$city_name,$postal_code,$father,$birth_date,
        $birth_place,$father_cell,$cnic,$status,$district,$gender,$degree, 
        $major_subject,$college_name,$degree_passing_date,$employment_status, 
        $institution_name,$institution_year,$course);

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
              <p>Error: " . htmlspecialchars($stmt->error) . "</p>
            </div>";
    }

    $stmt->close();
    $conn->close();
}
?>
