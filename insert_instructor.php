<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $instructor_name = $_POST['instructor_name'];
    $profession = $_POST['profession'];
    $instructor_image = $_POST['instructor_image'];
    $title = $_POST['title'];
    $instructor_reviews = $_POST['instructor_reviews'];
    $instructor_rating = $_POST['instructor_rating'];
    $instructor_students = $_POST['instructor_students'];
    $instructor_courses = $_POST['instructor_courses'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO instructors (name, profession, image, title, reviews, rating, students, courses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdsi", $instructor_name, $profession, $instructor_image, $title, $instructor_reviews, $instructor_rating, $instructor_students, $instructor_courses);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New instructor created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instructor</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
  
    .navbar {
      background-color: #007bff; 
    }
    .navbar-brand,
    .navbar-nav .nav-link {
      color: #ffffff; 
    }
    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
      color: #ffffff; 
    }
 
    body {
      background-color: #f8f9fa;
    }
    .form-section {
      width: 100%;
      padding: 20px;
    }
    h2 {
      color: #333333; 
      padding: 10px;
      background-color: #28a745; 
      margin-top: 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    label {
      font-weight: bold;
      margin-bottom: 0.5rem;
    }
    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 1rem;
      border: 1px solid #ced4da; /* Gray border */
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #007bff; /* Blue color for submit button */
      color: #ffffff; /* White text color */
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3; /* Darker blue color on hover */
    }
  </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a> <!-- Change this -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Home</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enroll-view.php">Enrolled Students</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="instructor_view.php">Instructors</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a> <!-- Change this -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Instructor Information Form Section -->
<div class="form-section">
  <h2>Instructor Information</h2>
  <form action="insert_instructor.php" method="post">
  <label for="instructor_name">Instructor Name:</label>
        <input type="text" id="instructor_name" name="instructor_name" required><br>

        <label for="profession">Profession:</label>
        <input type="text" id="profession" name="profession" required><br>

        <label for="instructor_image">Image URL:</label>
        <input type="text" id="instructor_image" name="instructor_image" required><br>

        <label for="title">Title:</label>
        <textarea id="title" name="title" required></textarea><br>

        <label for="instructor_reviews">Reviews:</label>
        <input type="text" id="instructor_reviews" name="instructor_reviews" required><br>

        <label for="instructor_rating">Rating:</label>
        <input type="number" step="0.1" id="instructor_rating" name="instructor_rating" required><br>

        <label for="instructor_students">Students:</label>
        <input type="text" id="instructor_students" name="instructor_students" required><br>

        <label for="instructor_courses">Courses:</label>
        <input type="number" id="instructor_courses" name="instructor_courses" required><br>

        <input type="submit" value="Submit">
  </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
