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


$PNo = $_POST['PNo'];
$PName = $_POST['PName'];
$PSex = $_POST['PSex'];
$PClass = $_POST['PClass'];
$PBankNo = $_POST['PBankNo'];
$PHeight = intval($_POST['PHeight']);
$PPhone = $_POST['PPhone'];
$PQQ = $_POST['PQQ'];
$PWechat = $_POST['PWechat'];
$PT_Size = $_POST['PT_Size'];
$PSeatNo = $_POST['PSeatNo'];
$PSignNo = intval($_POST['PSignNo']);
$PHdu = $_POST['PHdu'];
$PWeight = intval($_POST['PWeight']);
$PSingle = $_POST['PSingle'];
$PPassword = md5('123456');

$IsAdmin = false;

if (isset($_COOKIE["user"])){
    $PNo0 = $_COOKIE["user"];
    $sql1 = "SELECT PAdmin FROM person WHERE PNo='$PNo0'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $IsAdmin = $row['PAdmin'];
}

$sql1 = "SELECT * FROM person WHERE PNo='$PNo'";
$sql2 = "UPDATE person
    SET
    PName='$PName', PClass='$PClass', PBankNo='$PBankNo', PPhone='$PPhone', PHeight=$PHeight, 
    PWeight=$PWeight, PQQ='$PQQ', PWechat='$PWechat', PT_Size='$PT_Size', PHdu='$PHdu', 
    PSex='$PSex', PSeatNo='$PSeatNo', PSignNo=$PSignNo, PSingle='$PSingle'
    WHERE PNo='$PNo'";
$sql3 = "INSERT INTO
    person(PNo, PName, PClass, PBankNo, PPhone, PQQ, PWechat, PT_Size, PHdu, PPassword, PSex, PHeight, PWeight, PSeatNo, PSignNo, PSingle)
     Value ('$PNo', '$PName', '$PClass', '$PBankNo', '$PPhone', '$PQQ', '$PWechat', '$PT_Size', '$PHdu', '$PPassword', '$PSex', $PHeight, $PWeight, '$PSeatNo', $PSignNo, '$PSingle')";

$result = $conn->query($sql1);

if($result->num_rows>0) {
    if($IsAdmin==false && $PNo!=$PNo0) {
        echo "权限不足！";
    } else {
        $result = $conn->query($sql2);

        if($result==TRUE) {
            echo TRUE;
        } else {
            echo("错误描述: " . mysqli_error($conn));
        }

    }
} else {
    if($IsAdmin==false) {
        echo "权限不足！";
    } else {
        $result = $conn->query($sql3);

        if($result==TRUE) {
            echo TRUE;
        } else {
            echo("错误描述: " . mysqli_error($conn));
        }

    }
}

$conn->close();

?>
