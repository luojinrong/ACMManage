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

$PNo = $_POST['PNo'];
$PName = $_POST['PName'];
//$PSex = $_POST['PSex'];
$PClass = $_POST['PClass'];
$PBankNo = $_POST['PBankNo'];
//$PHeight = $_POST['PHeight'];
$PPhone = $_POST['PPhone'];
$PQQ = $_POST['PQQ'];
$PWechat = $_POST['PWechat'];
$PT_Size = $_POST['PT_Size'];
//$PSignNo = $_POST['PSignNo'];
//$PHdu = $_POST['PHdu'];
//$PWeight = $_POST['PWeight'];
//$PSingle = $_POST['PSingle'];
$PPassword = md5('123456');


$sql1 = "SELECT * FROM person WHERE PNo='$PNo'";
$sql2 = "UPDATE person
    SET
    PName='$PName', PClass='$PClass', PBankNo='$PBankNo', PPhone='$PPhone',
    PQQ='$PQQ', PWechat='$PWechat', PT_Size='$PT_Size', PPassword='$PPassword'
    WHERE PNo='$PNo'";
$sql3 = "INSERT INTO
    person(PNo, PName, PClass, PBankNo, PPhone, PQQ, PWechat, PT_Size, PPassword)
     Value ('$PNo', '$PName', '$PClass', '$PBankNo', '$PPhone', '$PQQ', '$PWechat', '$PT_Size', '$PPassword')";

//echo $sql2;

$result = $conn->query($sql1);

if($result->num_rows>0) {
    $result = $conn->query($sql2);
} else {
    $result = $conn->query($sql3);
}

echo $result;

$conn->close();

?>