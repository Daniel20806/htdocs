<?php

$servername="localhost";
$username = "s1114580";
$password="1114580";
$dbname="mydb(test)";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("連接失敗：". $conn -> connect_error);
}

$sql="SELECT * FROM user";
$result = $conn->query($sql);

if($result) {
    $res=$result->fetch_all();
    var_dump($res);
}

$conn->close();
?>