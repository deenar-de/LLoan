<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
// error_reporting(0);
$mId = $_COOKIE['mId'];
$npassword=$_POST['npassword'];
// echo $mId,$npassword;
$sql_query = "SELECT `password` FROM `member` WHERE mId='$mId'";
$result = mysqli_query($db_link, $sql_query);
$row=mysqli_fetch_assoc($result);
$password=$row['password'];
// echo $password;
if($_POST['opassword']!=$password){
    echo('密碼錯誤');
    header("Refresh:1;url=resetpw.php");
}else if($_POST['npassword']!= $_POST['rnpassword']){
    echo('密碼輸入不一致');
    header("Refresh:1;url=resetpw.php");
}else{
    $sql_query = "UPDATE `member` SET `password`='$npassword' WHERE mId='$mId'";
    $result = mysqli_query($db_link, $sql_query);
    echo('密碼修改成功');
    header("Refresh:1;url=LLoan_main.php");
}


?>