<?php
    error_reporting(0);
    header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
    $datetime = date ("Y-m-d H:i:s" , mktime(date('H')+6, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
    $account=$_COOKIE["account"];
    $comment=$_POST["comment"];
    $draw=$_POST["draw"];
    $mId=$_COOKIE['mId'];
    // echo $comment;
    // echo $account;
    // echo $account;
    // echo $comment;
    // echo $datetime;
    if (!$db_link) die("資料庫選擇失敗！");
    $sql_query2="INSERT INTO discuss (account, comment, time,draw,mId) 
                VALUES('$account','$comment', '$datetime','$draw','$mId')";
    mysqli_query($db_link, $sql_query2);
    header("Location: L_discuss.php");
?>