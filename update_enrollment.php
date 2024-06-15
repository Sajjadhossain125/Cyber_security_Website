<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data
    $sql = "SELECT * FROM enrollments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the data
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

        $sql = "UPDATE enrollments SET student_name=?, mobile_number=?, email_address=?, facebook_name=?, present_address=?, present_city=?, postal_codeC=?, permanent_address=?, city_name=?, postal_code=?, father_name=?, birth_date=?, birth_place=?, father_cell=?, cnic=?, marital_status=?, district=?, gender=?, last_degree=?, major_subject=?, college_name=?, degree_passing_year=?, employment_status=?, institution_name=?, institution_year=?, course=? WHERE id=?";
        
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("ssssssssssssssssssssssssssi", 
            $name, $number, $email, $surname, $present_address, $present_city, 
            $postal_codeC, $permanent_address, $city_name, $postal_code, $father, $birth_date,
            $birth_place, $father_cell, $cnic, $status, $district, $gender, $degree, 
            $major_subject, $college_name, $degree_passing_date, $employment_status, 
            $institution_name, $institution_year, $course, $id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Enrollment updated successfully.');
                    window.location.href = 'enroll.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating enrollment: " . htmlspecialchars($stmt->error) . "');
                  </script>";
        }

        $stmt->close();
    }
    $conn->close();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Enrollment</title>
  <style>
    .form-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 50px;
    }
    .form-container form {
      display: flex;
      flex-wrap: wrap;
      width: 100%;
    }
    .form-container .form-group {
      flex: 1 1 50%;
      padding: 10px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
    }
    .btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form action="update_enrollment.php?id=<?php echo $id; ?>" method="post">
      <h2>Update Enrollment</h2>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['student_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email_address']; ?>" required>
      </div>
      <div class="form-group">
        <label for="number">Mobile Number:</label>
        <input type="text" id="number" name="number" value="<?php echo $row['mobile_number']; ?>" required>
      </div>
      <div class="form-group">
        <label for="facebook-name">Facebook Name:</label>
        <input type="text" id="facebook-name" name="facebook-name" value="<?php echo $row['facebook_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="present-address">Present Address:</label>
        <input type="text" id="present-address" name="present-address" value="<?php echo $row['present_address']; ?>" required>
      </div>
      <div class="form-group">
        <label for="present-city">Present City:</label>
        <input type="text" id="present-city" name="present-city" value="<?php echo $row['present_city']; ?>" required>
      </div>
      <div class="form-group">
        <label for="postal-codeC">Postal Code:</label>
        <input type="text" id="postal-codeC" name="postal-codeC" value="<?php echo $row['postal_codeC']; ?>" required>
      </div>
      <div class="form-group">
        <label for="permanent-address">Permanent Address:</label>
        <input type="text" id="permanent-address" name="permanent-address" value="<?php echo $row['permanent_address']; ?>" required>
      </div>
      <div class="form-group">
        <label for="city-name">City Name:</label>
        <input type="text" id="city-name" name="city-name" value="<?php echo $row['city_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="postal-code">Postal Code (Village):</label>
        <input type="text" id="postal-code" name="postal-code" value="<?php echo $row['postal_code']; ?>" required>
      </div>
      <div class="form-group">
        <label for="father">Father's Name:</label>
        <input type="text" id="father" name="father" value="<?php echo $row['father_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="birth-date">Birth Date:</label>
        <input type="text" id="birth-date" name="birth-date" value="<?php echo $row['birth_date']; ?>" required>
      </div>
      <div class="form-group">
        <label for="birth-place">Birth Place:</label>
        <input type="text" id="birth-place" name="birth-place" value="<?php echo $row['birth_place']; ?>" required>
      </div>
      <div class="form-group">
        <label for="father-cell">Father's Cell:</label>
        <input type="text" id="father-cell" name="father-cell" value="<?php echo $row['father_cell']; ?>" required>
      </div>
      <div class="form-group">
        <label for="cnic">CNIC:</label>
        <input type="text" id="cnic" name="cnic" value="<?php echo $row['cnic']; ?>" required>
      </div>
      <div class="form-group">
        <label for="status">Marital Status:</label>
        <input type="text" id="status" name="status" value="<?php echo $row['marital_status']; ?>" required>
      </div>
      <div class="form-group">
        <label for="district">District:</label>
        <input type="text" id="district" name="district" value="<?php echo $row['district']; ?>" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required>
      </div>
      <div class="form-group">
        <label for="degree">Last Degree:</label>
        <input type="text" id="degree" name="degree" value="<?php echo $row['last_degree']; ?>" required>
      </div>
      <div class="form-group">
        <label for="major-subject">Major Subject:</label>
        <input type="text" id="major-subject" name="major-subject" value="<?php echo $row['major_subject']; ?>" required>
      </div>
      <div class="form-group">
        <label for="college-name">College Name:</label>
        <input type="text" id="college-name" name="college-name" value="<?php echo $row['college_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="degree-passing-date">Degree Passing Year:</label>
        <input type="text" id="degree-passing-date" name="degree-passing-date" value="<?php echo $row['degree_passing_year']; ?>" required>
      </div>
      <div class="form-group">
        <label for="employment-status">Employment Status:</label>
        <input type="text" id="employment-status" name="employment-status" value="<?php echo $row['employment_status']; ?>" required>
      </div>
      <div class="form-group">
        <label for="institution-name">Institution Name:</label>
        <input type="text" id="institution-name" name="institution-name" value="<?php echo $row['institution_name']; ?>" required>
      </div>
      <div class="form-group">
        <label for="institution-year">Institution Year:</label>
        <input type="text" id="institution-year" name="institution-year" value="<?php echo $row['institution_year']; ?>" required>
      </div>
      <div class="form-group">
        <label for="course">Course:</label>
        <input type="text" id="course" name="course" value="<?php echo $row['course']; ?>" required>
      </div>
      <div class="form-group" style="flex: 1 1 100%; text-align: center;">
        <input type="submit" class="btn" value="Update">
      </div>
    </form>
  </div>
</body>
</html>
