<?php
$lId = $_GET['lId'];
$pNum = $_GET['pNum'];
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$sql_query1 = "SELECT dl FROM loandetail
    WHERE lId='$lId' AND pNum='$pNum'";
$result1 = mysqli_query($db_link, $sql_query1);
$onTime = 0;
$NowTime = date("Y-m-d H:i:s");
while ($row = mysqli_fetch_assoc($result1)) {
    if ($row['dl'] >= strtotime("$NowTime,now")) {
        $onTime = 1;
    }
}
$sql_query = "UPDATE loandetail SET end =1 ,onTime=$onTime
    WHERE lId='$lId' AND pNum='$pNum'";
mysqli_query($db_link, $sql_query);

$sql_query2 = "SELECT * FROM loandetail
    WHERE lId='$lId' AND end=0 ";
$result2 = mysqli_query($db_link, $sql_query2);
$l = 0;
while ($row = mysqli_fetch_assoc($result2)) {
    $l++;
}
if ($l == 0) {
    $sql_query = "UPDATE loan SET progress =2 
    WHERE lId='$lId'";
    mysqli_query($db_link, $sql_query);
}
header("Refresh:0;url=myContract.php");
?>