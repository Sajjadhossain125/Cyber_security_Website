<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM enrollments WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Enrollment deleted successfully.');
                window.location.href = 'enroll.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting enrollment: " . htmlspecialchars($stmt->error) . "');
                window.location.href = 'enroll.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
