<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$mId = $_GET['id'];
$sql_query = "SELECT * FROM `member` NATURAL JOIN `mbank`,`mschool` WHERE member.mId='$mId'";
$result = mysqli_query($db_link, $sql_query);
$idcard1 = '';
$idcard2 = '';
$bankbook = '';
while ($row = mysqli_fetch_assoc($result)) {
    $idcard1 = $row['idcard1'];
    $idcard2 = $row['idcard2'];
    $bankbook = $row['bankbook'];
    $mscard = $row['msCard'];
}
echo '<img src="' . 'data:image/jpg;base64,' . $row['bankbook'] . '"width=100px >';
if (fopen($_FILES['idcard1']['tmp_name'], 'r') != FALSE) {
    $file = fopen($_FILES['idcard1']['tmp_name'], 'r');
    $fileContents = fread($file, filesize($_FILES['idcard1']['tmp_name']));
    fclose($file);
    $idcard1 = base64_encode($fileContents);
}
if (fopen($_FILES['idcard2']['tmp_name'], 'r') != FALSE) {
    $file2 = fopen($_FILES['idcard2']['tmp_name'], 'r');
    $fileContents2 = fread($file2, filesize($_FILES['idcard2']['tmp_name']));
    fclose($file2);
    $idcard2 = base64_encode($fileContents2);
}
if (fopen($_FILES['bankbook']['tmp_name'], 'r') != FALSE) {
    $file3 = fopen($_FILES['bankbook']['tmp_name'], 'r');
    $fileContents3 = fread($file3, filesize($_FILES['bankbook']['tmp_name']));
    fclose($file3);
    $bankbook = base64_encode($fileContents3);
}
if (fopen($_FILES['mscard']['tmp_name'], 'r') != FALSE) {
    $file4 = fopen($_FILES['mscard']['tmp_name'], 'r');
    $fileContents4 = fread($file4, filesize($_FILES['mscard']['tmp_name']));
    fclose($file4);
    $mscard = base64_encode($fileContents4);
}
$account = $_POST['account'];
$email = $_POST['email'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$id = $_POST['id'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$school = $_POST['school'];
$dep = $_POST['dep'];
$grade = $_POST['grade'];
$gschool = $_POST['gschool'];
$bankCode = $_POST['bankCode'];
$bankName = $_POST['bankName'];
$branch = $_POST['branch'];
$bankAccount = $_POST['bankAccount'];
$fp = $_POST['fp'];
$salary = $_POST['salary'];
$years = $_POST['years'];
$job = $_POST['job'];
$jobContent = $_POST['jobContent'];
$deposit = $_POST['deposit'];
$hasloan = $_POST['hasloan'];
if (!$db_link) die("資料庫選擇失敗！");
$sql_query2 = "UPDATE member SET account='$_POST[account]', email='$_POST[email]', 
                                        name='$_POST[name]',gender='$_POST[gender]',id='$_POST[id]',
                                        phone='$_POST[phone]', address1='$_POST[address1]',address2='$_POST[address2]',
                                        idcard1='$idcard1',idcard2='$idcard2' WHERE mId='$mId'";
mysqli_query($db_link, $sql_query2);

$sql_query3 = "UPDATE mbank SET bankCode='$_POST[bankCode]', bankName='$_POST[bankName]',
                                  branch='$_POST[branch]', bankbook='$bankbook',bankAccount='$bankAccount' WHERE mId='$mId'";
mysqli_query($db_link, $sql_query3);

if ($mscard == NULL) {
    $sql_query4 = "UPDATE mschool SET school='$_POST[school]', dep='$_POST[dep]',
                                  grade='$_POST[grade]' WHERE mId='$mId'";
}else{
    $sql_query4 = "UPDATE mschool SET school='$_POST[school]', dep='$_POST[dep]',
                                  grade='$_POST[grade]', msCard='$mscard' WHERE mId='$mId'";
}
mysqli_query($db_link, $sql_query4);
$sql_query5 = "UPDATE mjob SET fp='$fp', salary='$_POST[salary]',years='$_POST[years]', job='$_POST[job]',
                                  jobContent='$_POST[jobContent]', deposit='$deposit', hasloan='$hasloan' WHERE mId='$mId'";
mysqli_query($db_link, $sql_query5);
if ($_GET['ca'] == 2) {
    header("Location: memberinfo.php");
} else {
    header("Location: memberedit.php");
}
