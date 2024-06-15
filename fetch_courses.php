<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cyber_ez";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch courses data
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

$courses = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $course = [
            "id" => $row["id"],
            "name" => $row["name"],
            "subtitle" => $row["subtitle"],
            "shortDesc" => $row["short_desc"],
            "rating" => $row["rating"],
            "reviews" => $row["reviews"],
            "students" => $row["students"],
            "price" => $row["price"],
            "offPrice" => $row["off_price"],
            "enroll" => $row["enroll"],
            "lectures" => $row["lectures"],
            "quizzes" => $row["quizzes"],
            "passPercent" => $row["pass_percent"],
            "skillL" => $row["skill_level"],
            "image" => $row["image"],
            "instructor" => [
                "name" => $row["instructor_name"] ?? null,
                "profession" => $row["instructor_profession"] ?? null,
                "image" => $row["instructor_image"] ?? null,
                "title" => $row["instructor_title"] ?? null,
                "reviews" => $row["instructor_reviews"] ?? null,
                "rating" => $row["instructor_rating"] ?? null,
                "students" => $row["instructor_students"] ?? null,
                "courses" => $row["instructor_courses"] ?? null
            ],
            "requireDesc" => json_decode($row["require_desc"], true) ?? []
        ];
        $courses[] = $course;
    }
}

echo json_encode($courses);

$conn->close();
?>
