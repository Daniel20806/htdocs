<?php

$servername="localhost";
$username = "s1114580";
$password="1114580";
$dbname="final";

$conn = new mysqli($servername, $username, $password, $dbname);
$name = $_GET["MName"];
$release_date = $_GET["release_date"];
$introduction = $_GET["introduction"];
if($conn->connect_error) {
    die("連接失敗：". $conn -> connect_error);
}

$sql="INSERT INTO movie (Name, release_date, introduction)
VALUES ('$name', '$release_date', '$introduction')";

if ($conn->query($sql)){
    echo "新記錄插入成功";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>