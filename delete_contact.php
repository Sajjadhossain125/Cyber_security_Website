<?php
include 'db.php'; // Ensure this file contains your database connection

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Correct SQL query using name
    $sql = "DELETE FROM contact_us WHERE name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the name parameter
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo "<script>
                alert('Record deleted successfully.');
                window.location.href = 'contact-us-insert.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting record: " . htmlspecialchars($stmt->error) . "');
                window.location.href = 'contact-us-insert.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
            alert('Invalid request.');
            window.location.href = 'contact-us-insert.php';
          </script>";
}
?>
