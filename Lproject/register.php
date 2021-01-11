<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
// error_reporting(0);
session_start();
$file = fopen($_FILES['bankbook']['tmp_name'], 'r');
$fileContents = fread($file, filesize($_FILES['bankbook']['tmp_name']));
fclose($file);
$bankbook = base64_encode($fileContents);
$zbankbook = $_POST['zbankbook'];
$account = $_COOKIE['account'];
$deposit = $_SESSION['deposit'];
$hasloan = $_SESSION['hasloan'];
$fp = $_SESSION['fp'];
$salary = $_SESSION['salary'];
$years = $_SESSION['years'];
$job = $_SESSION['job'];
$jobContent = $_SESSION['jobContent'];
$name = $_SESSION['name'];
$gender = $_SESSION['gender'];
$id = $_SESSION['id'];
$phone = $_SESSION['phone'];
$address1 = $_SESSION['address1'];
$address2 = $_SESSION['address2'];
$idcard1 = $_SESSION['idcard1'];
$idcard2 = $_SESSION['idcard2'];
$school = $_SESSION['school'];
$dep = $_SESSION['dep'];
$grade = $_SESSION['grade'];
$mscard = $_SESSION['mscard'];
$zdeposit = $_SESSION['zdeposit'];
$zhasloan = $_SESSION['zhasloan'];
$zfp = $_SESSION['zfp'];
$zsalary = $_SESSION['zsalary'];
$zyears = $_SESSION['zyears'];
$zjob = $_SESSION['zjob'];
$zjobContent = $_SESSION['zjobContent'];
$zname = $_SESSION['zname'];
$zgender = $_SESSION['zgender'];
$zphone = $_SESSION['zphone'];
$zaddress1 = $_SESSION['zaddress1'];
$zaddress2 = $_SESSION['zaddress2'];
$zidcard1 = $_SESSION['zidcard1'];
$zidcard2 = $_SESSION['zidcard2'];
$zschool = $_SESSION['zschool'];
$zdep = $_SESSION['zdep'];
$zgrade = $_SESSION['zgrade'];
$zmscard = $_SESSION['zmscard'];
$bankCode = $_POST['bankCode'];
$bankName = $_POST['bankName'];
$branch = $_POST['branch'];
$bankAccount = $_POST['bankAccount'];
$zbankCode = $_POST['zbankCode'];
$zbankName = $_POST['zbankName'];
$zbranch = $_POST['zbranch'];
$zbankAccount = $_POST['zbankAccount'];
$mId = $_COOKIE['mId'];
$sql_query = "SELECT * FROM member WHERE mId='$mId'";
$result = mysqli_query($db_link, $sql_query);
$row = mysqli_fetch_assoc($result);
$rStage = $row['rStage'];
$rmode = $_SESSION['rmode'];
date_default_timezone_set("Asia/Shanghai");
$rDate = date("Y-m-d");
// echo $account;
if (!$db_link) die("資料庫選擇失敗！");

if ($rmode == 3) {
    $sql_query = "UPDATE member SET name='$name',rDate='$rDate',gender='$gender',id='$id',phone='$phone',
                                    address1='$address1',address2='$address2',idcard1='$idcard1',idcard2='$idcard2',rStage='3',
                                    zname='$zname',zgender='$zgender',zphone='$zphone',
                                    zaddress1='$zaddress1',zaddress2='$zaddress2',zidcard1='$zidcard1',zidcard2='$zidcard2'
                                    WHERE mId='$mId'";
} else if ($rmode == 2) {
    $sql_query = "UPDATE member SET rStage='2' WHERE mId='$mId'";
}
mysqli_query($db_link, $sql_query);
$sql_query2 = "UPDATE mschool SET school='$school',dep='$dep',grade='$grade',msCard='$mscard',
                                        zschool='$zschool',zdep='$zdep',zgrade='$zgrade',zmsCard='$zmscard'
                    WHERE mId='$mId'";
mysqli_query($db_link, $sql_query2);
if ($rStage == 1) {
    $sql_query3 = "UPDATE mbank SET  bankCode='$bankCode',bankName='$bankName',branch='$branch',bankAccount='$bankAccount',bankbook='$bankbook',
                                        zbankCode='$zbankCode',zbankName='$zbankName',zbranch='$zbranch',zbankAccount='$zbankAccount',zbankbook='$zbankbook'
                    WHERE mId='$mId'";
    mysqli_query($db_link, $sql_query3);
}
$sql_query4 = "UPDATE mjob SET fp='$fp', salary='$salary', years='$years', job='$job', jobContent='$jobContent', hasloan='$hasloan', deposit='$deposit',
                                    zfp='$zfp', zsalary='$zsalary', zyears='$zyears', zjob='$zjob', zjobContent='$zjobContent', zhasloan='$zhasloan', zdeposit='$zdeposit'
                    WHERE mId='$mId'";
mysqli_query($db_link, $sql_query4);
setcookie("rStage", 2, time() + 3600);
?>
<script>
    alert("資料填寫完成~");
</script>
<?php
header("Refresh:0;url=LLoan_main.php");
?>