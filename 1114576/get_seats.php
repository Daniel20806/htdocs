<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1114576";
$dbname = "final";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$time = isset($_GET['time']) ? $_GET['time'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

$sql = "SELECT `room` FROM schedules WHERE time=? AND date=? AND name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $time, $date, $name);
$stmt->execute();
$result = $stmt->get_result();

$rooms = array();
while ($row = $result->fetch_assoc()) {
    $rooms[] = $row['room'];
}

$stmt->close();

$bookedSeats = [];
if (!empty($rooms)) {
    $_SESSION['room'] = $rooms[0];

    $sql = "SELECT `row`, `column` FROM seat_fuck WHERE status='booked' AND time=? AND date=? AND room=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $time, $date, $_SESSION['room']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row["row"] . "-" . $row["column"];
        }
    }

    $stmt->close();
}

$conn->close();

echo json_encode(['bookedSeats' => $bookedSeats]);
?>