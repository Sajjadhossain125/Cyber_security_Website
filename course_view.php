
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>

    /* Navigation Bar Styling */
    .navbar {
      background-color: #007bff; /* Navbar background color */
    }
    .navbar-brand,
    .navbar-nav .nav-link {
      color: #ffffff; /* Navbar text color */
    }
    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
      color: #ffffff; /* Navbar text color on hover */
    }
    /* Your existing styles here */
    body {
      width: 100%;
      background-color: antiquewhite;
      font-family: Arial, sans-serif;
    }
    .form-container {
      width: 100%;
      margin: 20px auto;
      border-radius: 5px;
      background-color: rgb(250, 250, 250);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    h1, h2 {
      color: white;
      padding: 10px;
      background-color: green;
      border-radius: 5px;
      text-align: center;
      margin-top:20px
    }
    label {
      display: block;
      font-style: italic;
      margin-top: 10px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 7px;
      border: 1px solid rgb(192, 87, 87);
      box-sizing: border-box;
    }
    input:hover, textarea:hover {
      border: 2px solid gray;
    }
    .btn {
      margin-top: 20px;
      padding: 10px 20px;
      border-radius: 5px;
      color: white;
      background-color: green;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .btn:hover {
      background-color: aquamarine;
      color: black;
    }
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    .edit a{
        width: 250px;
     background: green;
     padding:10px;
     border-radius:5px;
     text-decoration:none;
     
    }
    .delete{
      background:red;
      padding:10px;
     border-radius:5px;
     text-decoration:none;
    }
    .insert{
      background:#1a8cff;
      padding:10px;
      border-radius:5px;
      text-decoration:none;
    }
    a{
      color:white;
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
          <a class="nav-link" href="#">Instructors</a> <!-- Change this -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a> <!-- Change this -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navigation Bar END -->



  <h1>Courses</h1>



  <div class="form-container">
    <h2>Courses view</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Subtitle</th>
          <th>Short_Desc</th>
          <th>Rating</th>
          <th>Reviews</th>
          <th>Price</th>
          <th>Discount_price</th>
          <th>Instructor</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // PHP code to fetch and display enrollments from the database
        include 'db.php';
        $result = $conn->query("SELECT * FROM courses");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['subtitle']}</td>
                  <td>{$row['short_desc']}</td>
                  <td>{$row['rating']}</td>
                  <td>{$row['reviews']}</td>
                  <td>{$row['price']}</td>
                  <td>{$row['discount']}</td>
                  <td>{$row['instructor']}</td>
                  
                  <td>
                   <span class='edit'> <a  href='update_enrollment.php?id={$row['id']}'>Update</a></span>
                   <br>
                   <br>
                    <a class='delete' href='delete_course.php?id={$row['id']}'>Delete</a>
                    <br>
                    <br>
                    <a class='insert' href='admin.php?id={$row['id']}'>Insert </a>
                  </td>
                </tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
