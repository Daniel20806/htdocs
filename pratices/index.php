<?php
header("content-type:text/html;charset=utf-8");
$host="localhost";
$user="s1114580";
$password="1114580";
$db="mydb(test2)";

$mysqli=new mysqli($host,$user,$password,$db);
if ($mysqli->connect_errno) {
    die("Error: ". $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql='SELECT username, age, gender FROM domo WHERE uid=?';
$mysqli_stmt=$mysqli->prepare($sql);
$id= 8;
$mysqli_stmt->bind_param('i',$id);

if ($mysqli_stmt->execute()) {
    $mysqli_stmt->bind_result($uid, $brief);
    while ($mysqli_stmt->fetch()) {
        echo '姓名：' . $uid;
        echo '<br/>年齡：'. $brief;
        echo '<br/>性別：'. $gender;
    }
}

$mysqli_stmt->free_result();
$mysqli_stmt->close();
$mysqli->close();
?>