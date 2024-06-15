<?php
include 'db.php'; // Ensure this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required POST parameters are set
    if (isset($_POST['course_name']) && isset($_POST['course_subtitle']) && isset($_POST['short_desc']) &&
        isset($_POST['rating']) && isset($_POST['reviews']) && isset($_POST['price']) &&
        isset($_POST['discount']) && isset($_POST['instructor']) && isset($_POST['instructor_img']) &&
        isset($_POST['image'])) {

    
        $stmt = $conn->prepare("INSERT INTO courses (name, subtitle, short_desc, rating, reviews, price, discount, instructor, instructor_img, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("ssssssssss", $course_name, $course_subtitle, $short_desc, $rating, $reviews, $price, $discount_price, $instructor_name, $instructor_image, $image);

        $course_name = $_POST['course_name'];
        $course_subtitle = $_POST['course_subtitle'];
        $short_desc = $_POST['short_desc'];
        $rating = $_POST['rating'];
        $reviews = $_POST['reviews'];
        $price = $_POST['price'];
        $discount_price = $_POST['discount'];
        $instructor_name = $_POST['instructor'];
        $instructor_image = $_POST['instructor_img'];
        $image = $_POST['image'];

        if ($stmt->execute()) {
            echo "New course created successfully";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Error: Missing required POST parameters";
    }
}

$conn->close();
?>
