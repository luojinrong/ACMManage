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

$OffCNo = 100000000;
//$OffCName = '西安邀请赛';
//$University = '西安';
//$Expend = '2000';
//$Time = '2019-5-18';
$OffCName = $_POST['OffCName'];
$University = $_POST['University'];
$Expend = $_POST['Expend'];
$Time = $_POST['Time'];

$sql1 = "SELECT * FROM OfflineContest";

$result = $conn->query($sql1);

$OffCNo = $OffCNo + $result->num_rows;
$OffCNo = "OffC".substr($OffCNo,1);

$sql2 = "INSERT INTO
    OfflineContest(OffCNo, OffCName, University, Expend, Time)
     Value ('$OffCNo', '$OffCName', '$University', '$Expend', '$Time')";

$result = $conn->query($sql2);

echo $result;

$conn->close();

?>