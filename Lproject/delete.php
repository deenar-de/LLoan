<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
if (!$db_link) die("資料庫選擇失敗！");
$id = $_GET['id'];
$ca = $_GET['ca'];
if ($ca == 1) {
    $sql_query = "DELETE FROM member WHERE mId='$id'";
    mysqli_query($db_link, $sql_query);
    header("Location: memberedit.php");
} else if ($ca == 2) {
    $sql_query2 = "DELETE FROM discuss WHERE discussid='$id'";
    mysqli_query($db_link, $sql_query2);
    header("Location: L_discuss.php");
} else if ($ca == 3) {
    $sql_query2 = "DELETE FROM loan WHERE lId='$id'";
    mysqli_query($db_link, $sql_query2);
    header("Location: listloan.php");
} else if ($ca == 4) {
    $sql_query2 = "DELETE FROM discuss WHERE discussid='$id'";
    mysqli_query($db_link, $sql_query2);
    header("Location: discussadmin.php");
}