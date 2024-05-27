<?php

$servername="localhost";
$username = "s1114580";
$password="1114580";
$dbname="final";

$conn = new mysqli($servername, $username, $password, $dbname);
$name = $_GET["MName"];
$newName = $_GET["newName"];

if($conn->connect_error) {
    die("連接失敗：". $conn -> connect_error);
}

$sql="UPDATE movie SET Name = '$newName'
      WHERE Name = '$name'";

if ($conn->query($sql)){
    echo "成功修改為$newName";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>