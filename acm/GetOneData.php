<?php

$servername = "127.0.0.1";
$username0 = "root";
$password0 = "";
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
    $IsAdmin = row['PAdmin'];
}

$PNo1 = $_POST('PNo');

if ($IsAdmin) {

    $sql2 = "SELECT PNo, PName, PSex, PClass, PBankNo, PHeight, PPhone, PQQ, PWechat, PT_Size, PSignNo, PHdu, PWeight, PSingle FROM person WHERE PNo='$PNo1'";
    $result = $conn->query($sql2);
    echo json_encode(mysqli_fetch_assoc($result));

} else {

    $sql2 = "SELECT PNo, PName, PSex, PClass, PBankNo, PHeight, PPhone, PQQ, PWechat, PT_Size, PSignNo, PHdu, PWeight, PSingle, PPassword FROM person WHERE PNo='$PNo1'";
    $result = $conn->query($sql2);
    echo json_encode(mysqli_fetch_assoc($result));

}

?>