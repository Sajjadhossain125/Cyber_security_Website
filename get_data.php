<?php
// Include your database connection file
include 'db.php';


$sql = "SELECT id, name, subtitle, short_desc, rating, reviews, price, off_price, image FROM courses";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
