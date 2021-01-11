<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$account = $_POST['account'];
$email = $_POST['email'];
$password = $_POST['password'];
$rpassword=$_POST['rpassword'];
$zaccount=$_POST['zaccount'];
$zemail=$_POST['zemail'];
if($password!=$rpassword){
    echo('密碼輸入錯誤');
    header("Refresh:0;url=L_register.html");
}
$sql_query = "INSERT INTO member (account,email,password,authority,rStage,zaccount,zemail) VALUES('$account','$email','$password','1','1','$zaccount','$zemail')";
mysqli_query($db_link, $sql_query);
$sql_query5 = "SELECT mId FROM member WHERE email='$email'";
$result = mysqli_query($db_link, $sql_query5);
$mId;
while ($row = mysqli_fetch_assoc($result)) {
    $mId = $row['mId'];
}
$sql_query2 = "INSERT INTO mschool (mId) VALUES('$mId')";
mysqli_query($db_link, $sql_query2);
$sql_query3 = "INSERT INTO mbank (mId) VALUES('$mId')";
mysqli_query($db_link, $sql_query3);
$sql_query4 = "INSERT INTO mjob (mId) VALUES('$mId')";
mysqli_query($db_link, $sql_query4);

?>
<script>
    alert("請至信箱收取驗證信並完成註冊，重新登入，並進入會員資訊完成資料填寫");
</script>
<?php
header("Refresh:0;url=mail.php?address=$email");
?>