<?php
$servername = "localhost";
$username = "root";
$password = "1114576";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `row`, `column` FROM seats WHERE status='booked'";
$result = $conn->query($sql);

$bookedSeats = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row["row"] . "-" . $row["column"];
    }
}

$conn->close();

echo json_encode(['bookedSeats' => $bookedSeats]);
?>