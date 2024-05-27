<?php
$servername = "localhost";
$username = "root";
$password = "1114576";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$selectedSeats = $data['selectedSeats'];

$errors = [];

foreach ($selectedSeats as $seat) {
    list($row, $column) = explode('-', $seat);
    $sql = "UPDATE seats SET status='booked' WHERE `row`='$row' AND `column`='$column'";

    if ($conn->query($sql) !== TRUE) {
        $errors[] = $seat;
    }
}

$conn->close();

if (empty($errors)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'errors' => $errors]);
}