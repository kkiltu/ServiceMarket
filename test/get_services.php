<?php
include 'db_connect.php';

$sql = "SELECT * FROM services ORDER BY id DESC";
$result = $conn->query($sql);

$services = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($services, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
