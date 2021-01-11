<?php
$mId = $_COOKIE['mId'];
date_default_timezone_set("Asia/Shanghai");
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$lId = $_GET['lId'];
$sql_query = "UPDATE loan SET progress=1,imId='$mId'
                    WHERE lId='$lId'";
mysqli_query($db_link, $sql_query);
$sql_query2 = "SELECT * FROM loan WHERE lId='$lId'";
$result = mysqli_query($db_link, $sql_query2);
$row = mysqli_fetch_assoc($result);
$money = ($row['loan'] * (1 + $row['iRate'] * 0.01)) / $row['period'];
$money1 = $money * 0.9;
$money2 = $money * 0.1;
for ($a = 1; $a <= $row['period']; $a++) {
    $dl = strtotime('+' . $a . ' month');
    $sql_query3 = "INSERT INTO loandetail (lId,pNum,money1,money2,dl) 
                        VALUES('$lId','$a','$money1','$money2','$dl')";
    mysqli_query($db_link, $sql_query3);
}
header("Refresh:0;url=listInvest.php");
?>
