<?php
include("class.phpmailer.php"); //匯入PHPMailer類別
include("class.smtp.php"); //匯入PHPMailer類別
$address=$_GET['address'];
$mail= new PHPMailer(); //建立新物件
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8"; //郵件編碼
$mail->Username = "lareinaloan@gmail.com"; //Gamil帳號
$mail->Password = "1qaa2wss"; //Gmail密碼
$mail->From = "lareinaloan@gmail.com"; //寄件者信箱
$mail->FromName = "Lareina"; //寄件者姓名
$mail->Subject ='信箱驗證';  //郵件標題
$mail->Body = "<h1><a href=http://localhost/Lproject/identify.php?id=123&address=$address>點選驗證</h1>"; //郵件內容
$mail->IsHTML(true);ssl://smtp.gmail.com
$mail->AddAddress($address);//收件者
if(!$mail->Send())
{
	echo $mail->ErrorInfo;
	
}	
header("Refresh:0;url=LLoan_main.php");
?>