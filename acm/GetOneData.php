<?php

$servername = "127.0.0.1";
$username0 = "root";
$password0 = "root";
$dbname = "ACMInfo";

// 创建连接
$conn = new mysqli($servername, $username0, $password0, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$IsAdmin = false;

if (isset($_COOKIE["user"])){
    $PNo0 = $_COOKIE["user"];
    $sql1 = "SELECT PAdmin FROM person WHERE PNo='$PNo0'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $IsAdmin = $row['PAdmin'];
}

$PNo1 = $_POST['PNo'];

if ($IsAdmin) {

    $sql2 = "SELECT * FROM person WHERE PNo='$PNo1'";
    $result = $conn->query($sql2);
    if($result) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        $a['error'] = "查询出错！";
        echo json_encode($a);
    }

} else {

    $sql2 = "SELECT * FROM NormalData WHERE PNo='$PNo1'";
    $result = $conn->query($sql2);
    if($result) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        $a['error'] = "查询出错！";
        echo json_encode($a);
    }
}

?>