<?php

$servername = "localhost";
$username = "s1114580";
$password = "1114580";
$dbname = "final";

if (isset($_GET["button2"])) {
    $servername = "localhost";
    $username = "s1114580";
    $password = "1114580";
    $dbname = "final";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $movie = $_GET["MName"];

    $sql = "SELECT member_ID, context, time FROM comment WHERE Movie_name = :movie";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['movie' => $movie]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        echo "評論人: " . $row['member_ID'] . "<br>";
        echo "評論: " . $row['context'] . "<br><br>";
        echo "評論時間: " . $row['time'] . "<br><br>";
    }

    die();
}

$conn = new mysqli($servername, $username, $password, $dbname);
$name = $_GET["MName"];
date_default_timezone_set("Asia/Taipei");
$time = date("Y-m-d H:i:s");
$context = $_GET["context"];

if ($conn->connect_error) {
    die("連接失敗：" . $conn->connect_error);
}

$sql = "INSERT INTO comment
      VALUE (1, '$name', '$time', '$context')";

if ($conn->query($sql)) {
    echo "新增評論成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>