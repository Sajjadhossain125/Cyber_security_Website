
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Registration</title>

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
          <a class="nav-link" href="#">Home</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enroll-view.php">Enrolled Students</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="instructor_view.php">Instructors</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course_view.php">Course Info</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us-view.php">Contact-us</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a> <!-- Change this -->
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Course Information Form Section -->
<div class="form-section">
  <form action="insert_course.php" method="post">
     <hr> 
    <h2>Course Information</h2>
       <hr> 
    <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required><br>

        <label for="course_subtitle">Course Subtitle:</label>
        <input type="text" id="course_subtitle" name="course_subtitle" required><br>

        <label for="short_desc">Short Description:</label>
        <textarea id="short_desc" name="short_desc" required></textarea><br>

        <label for="rating">Rating:</label>
        <input type="number" step="0.1" id="rating" name="rating" required><br>

        <label for="reviews">Reviews:</label>
        <input type="text" id="reviews" name="reviews" required><br>

        <label for="price">Price:</label>
        <input type="text" step="0.01" id="price" name="price" required><br>

        <label for="off_price">Discounted Price:</label>
        <input type="text" step="0.01" id="discount" name="discount" required><br>

        <label for="enroll">Instructor Name:</label>
        <input type="text" id="instructor" name="instructor" required><br>
        <label for="skill_level">Instructor image_URL</label>
        <input type="text" id="instructor_img" name="instructor_img" required><br>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required><br>

        <input type="submit" value="Submit">
  </form>
</div>
<!-- JavaScript Bundle with Popper (Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
