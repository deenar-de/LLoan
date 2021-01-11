<?php
    header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
    $email=$_GET['address'];
    $id=$_GET['id'];
    if($id=='123'){
        $sql_query="UPDATE member SET identify=1
                    WHERE email='$email'";
        mysqli_query($db_link, $sql_query);
    }
    header("Refresh:0;url=LLoan_main.php");
?>