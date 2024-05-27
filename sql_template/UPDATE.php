<?php

$servername="localhost";
$username = "s1114580";
$password="1114580";
$dbname="mydb(test)";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("連接失敗：". $conn -> connect_error);
}

$sql="UPDATE user SET gender='114'
WHERE username='John'";

if ($conn->query($sql)){
    echo "記錄更新成功";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>