<?php
$username = $_POST["username"];
$password = $_POST["mima"];
session_start();

$check = 0;


if (trim($username) == "") {
    echo "姓名不得爲空！";
    $check++;
}
if (strlen(trim($password)) < 6) {
    echo "密碼過短！";
    $check++;
}
if (!$check) {


    echo "登入成功！歡迎$username!";

}
?>