<?php

if (isset($_COOKIE["user"])) {
//    $PNo = $_COOKIE["user"];
    setcookie("user", "", time() - 3600);
    echo true;
} else {
    echo false;
}

?>
