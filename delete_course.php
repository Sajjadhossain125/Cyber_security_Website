<?php
include 'db.php'; // Ensure this file contains your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Course deleted successfully.');
                window.location.href = 'insert_course.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting course: " . htmlspecialchars($stmt->error) . "');
                window.location.href = 'insert_course.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
