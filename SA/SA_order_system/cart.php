<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$host = 'localhost';
$db = 'sa';
$user = 's1114580';
$pass = '1114580';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$rand = rand();
date_default_timezone_set('Asia/Taipei');
$time = date("Y-m-d H:i:s");
$total=0;

foreach ($data as $item) {
        $total += $item["price"]*$item["quantity"];
 
}

foreach ($data as $item) {
    try {
        $stmt = $pdo->prepare('INSERT INTO cart (id, product, quantity, price) VALUES (?, ?, ?, ?)');
        $stmt->execute([$rand, $item['name'], $item['quantity'], $item['price'] * $item['quantity']]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        exit;
    }
}

    session_start();
    $phone = $_SESSION['phone'];
    //$phone = $_COOKIE('phone');

    $stmt = $pdo->prepare('INSERT INTO c_order (id, time, price, phone_number) VALUES (?, ?, ?, ?)');
    $stmt->execute([$rand, $time, $total, $phone]);


echo json_encode(['status' => 'success']);
?>