<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$id = $_GET['id'];
$ca = $_GET['ca'];
if($ca==1){
    $sql_query = "UPDATE member SET ban=0 WHERE mId='$id'";
    mysqli_query($db_link, $sql_query);
    header("Location: memberedit.php");
}if($ca==2){
    $sql_query = "UPDATE loan SET ban=0 WHERE lId='$id'";
    mysqli_query($db_link, $sql_query);
    header("Location: loanadmin.php");
}
