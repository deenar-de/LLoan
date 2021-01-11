<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$email = $_POST['email'];
$password = $_POST['password'];
if (!$db_link) die("資料庫選擇失敗！");
$sql_query = "SELECT * FROM member WHERE email='$email' AND password='$password'";
$result = mysqli_query($db_link, $sql_query);
$a = 0;
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $a++;
    $authority = $row['authority'];
    $account = $row['account'];
    $rStage = $row['rStage'];
    $mId = $row['mId'];
    $i = $row['identify'];
    $ban=$row['ban'];
}
if ($a == 0) {
?>
    <script>
        alert("帳號或密碼錯誤，請重新登入!");
    </script>
<?php
    header("Refresh:0; url=L_login.html");
} else if ($a == 1 && $i == 0) { ?>
    <script>
        alert("未驗證，請點選信箱驗證");
    </script>
<?php
    header("Refresh:0;url=mail.php?address=$email");
} else if ($ban == 1) { ?>
    <script>
        alert('你已被封鎖，請聯絡管理員')
    </script>
<?php
    header("Refresh:0; url=LLoan_main.php");
} else{
    setcookie("account", $account, time() + 36000);
    setcookie("authority", $authority, time() + 36000);
    setcookie("rStage", $rStage, time() + 36000);
    setcookie("mId", $mId, time() + 36000);
    // echo"歡迎"," ",$_COOKIE["account"];
?>
    <script>
        alert("登入成功");
    </script>
<?php
    if ($authority == 0) {
        header("Refresh:0; url=loanadmin.php");
    } else {

        header("Refresh:0; url=LLoan_main.php");
    }
}

?>