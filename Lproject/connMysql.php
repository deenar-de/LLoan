<?php 
 //資料庫主機設定
 $db_host = "localhost";
 $db_username = "lloan";
 $db_password = "lloan";
 $db_name ="lloan";
 //連線伺服器
 $db_link = @mysqli_connect($db_host, $db_username, $db_password,$db_name);
 if (!$db_link) die("資料連結失敗！");
 //設定字元集與連線校對
 mysqli_set_charset($db_link, 'utf8');
?>