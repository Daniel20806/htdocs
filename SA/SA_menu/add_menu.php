<?php
$servername = "localhost";
$username = "root";
$password = "1114576";
$dbname = "sa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$category = $_POST['category'];
$itemName = $_POST['itemName'];
$itemPrice = $_POST['itemPrice'];


$conn->set_charset("utf8");
$sql = "SELECT * FROM menu WHERE name='$itemName'";
    $result = $conn->query($sql);
    if ($result->num_rows === 0) {
        $sql = "INSERT INTO menu (category, name, price) VALUES ('$category', '$itemName', '$itemPrice')";
        if ($conn->query($sql) === TRUE) {
            header('Location: menu.html');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

$conn->close();

?>