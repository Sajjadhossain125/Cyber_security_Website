<?php
include_once "../db.php";

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

header('Content-Type: application/json');

echo json_encode(array_values(iterator_to_array($result)));

?>


