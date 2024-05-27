<?php

$servername="localhost";
$username = "s1114580";
$password="1114580";
$dbname="mydb(test)";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("連接失敗：". $conn -> connect_error);
}

$sql="DELETE FROM user WHERE username='John'";

mysqli_query($conn,$sql);

echo "刪除成功";

$conn->close();
?>