<?php
$lId = $_GET['lId'];
$mId = $_GET['mId'];
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$sql_query = "SELECT * FROM loan NATURAL JOIN member,mschool,mjob,mbank  WHERE member.mId=loan.mId AND mschool.mId=loan.mId AND mjob.mId=loan.mId AND mbank.mId=loan.mId AND loan.lId='$lId'";
$result = mysqli_query($db_link, $sql_query);

?>
<!DOCTYPE html>
<meta charset="UTF-8" />
<html>
<title>首頁</title>

<head>
    <!--META資料-->
    <META NAME="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="KeyWords" CONTENT="LLoan">
    <META NAME="Author" CONTENT="Yslin">
    <!--引用CSS檔-->
    <style type="text/css">
        @import url("./LLoan.css");
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@500&display=swap');
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
    </style>
    <script src="function.js"></script>

</head>


<body>
    <div class="full">
        <!--頁首-->

        <div class="content" align='center'>
            <table class="member" border="1">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="thead">案件編號</td>
                        <td class="data">A00<?php echo $row['lId'] ?></td>
                    </tr>
                    <tr>
                        <td class="thead">用途</td>
                        <td class="data"><?php echo $row['reason'] ?></td>
                    </tr>
                    <tr>
                        <td class="thead">用途描述</td>
                        <td class="data"><?php echo $row['description'] ?></td>
                    </tr>
                    <tr>
                        <td class="thead">貸款金額</td>
                        <td class="data">NT$<?php echo $row['loan'] ?></td>
                    </tr>
                    <tr>
                        <td class="thead">利率</td>
                        <td class="data"><?php echo $row['iRate'] ?>%</td>
                    </tr>
                    <tr>
                        <td class="thead">期數</td>
                        <td class="data"><?php echo $row['period'] . '期' ?></td>
                    </tr>
                    <?php if ($row['zaccount'] == 1) { ?>
                        <tr>
                            <td class="thead">帳號</td>
                            <td class="data"><?php echo $row['account']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zemail'] == 1) { ?>
                        <tr>
                            <td class="thead">電子郵件</td>
                            <td class="data"><?php echo $row['email']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zname'] == 1) { ?>
                        <tr>
                            <td class="thead">姓名</td>
                            <td class="data"><?php echo $row['name']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zgender'] == 1) { ?>
                        <tr>
                            <td class="thead">性別</td>
                            <td class="data"><?php
                                                if ($row['gender'] == 'male') {
                                                    echo ('男性');
                                                } else {
                                                    echo ('女性');
                                                } ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zphone'] == 1) { ?>
                        <tr>
                            <td class="thead">電話</td>
                            <td class="data"><?php echo $row['phone']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zaddress1'] == 1) { ?>
                        <tr>
                            <td class="thead">戶籍地址</td>
                            <td class="data"><?php echo $row['address1']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zaddress2'] == 1) { ?>
                        <tr>
                            <td class="thead">聯絡地址</td>
                            <td class="data"><?php echo $row['address2']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zidcard1'] == 1) { ?>
                        <tr>
                            <td class="thead">身分證正面</td>
                            <td class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['idcard1'] . '"width=100px >'; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zidcard2'] == 1) { ?>
                        <tr>
                            <td class="thead">身分證反面</td>
                            <td class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['idcard2'] . '"width=100px >'; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zschool'] == 1) { ?>
                        <tr>
                            <td class="thead">就讀學校</td>
                            <td class="data"><?php echo $row['school']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zdep'] == 1) { ?>
                        <tr>
                            <td class="thead">就讀科系</td>
                            <td class="data"><?php echo $row['dep']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zgrade'] == 1) { ?>
                        <tr>
                            <td class="thead">年級</td>
                            <td class="data"><?php echo $row['grade']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zmsCard'] == 1) { ?>
                        <tr>
                            <td class="thead">學生證照片</td>
                            <td class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['msCard'] . '"width=100px >'; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zbankCode'] == 1) { ?>
                        <tr>
                            <td class="thead">銀行代碼</td>
                            <td class="data"><?php echo $row['bankCode']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zbankName'] == 1) { ?>
                        <tr>
                            <td class="thead">銀行名稱</td>
                            <td class="data"><?php echo $row['bankName']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zbranch'] == 1) { ?>
                        <tr>
                            <td class="thead">分行</td>
                            <td class="data"><?php echo $row['branch']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zbankAccount'] == 1) { ?>
                        <tr>
                            <td class="thead">銀行帳號</td>
                            <td class="data"><?php echo $row['bankAccount']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zbankbook'] == 1) { ?>
                        <tr>
                            <td class="thead">存摺封面</td>
                            <td class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['bankbook'] . '"width=100px >'; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zfp'] == 1) { ?>
                        <tr>
                            <td class="thead">工作</td>
                            <td class="data"><?php if ($row['fp'] == 'parttime') {
                                                    echo ('打工');
                                                } else {
                                                    echo ('正職');
                                                } ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zsalary'] == 1) { ?>
                        <tr>
                            <td class="thead">年薪</td>
                            <td class="data"><?php echo $row['salary']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zyears'] == 1) { ?>
                        <tr>
                            <td class="thead">年資</td>
                            <td class="data"><?php echo $row['years']; ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($row['zjob'] == 1) { ?>
                        <tr>
                            <td class="thead">職稱</td>
                            <td class="data"><?php echo $row['job']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zjobContent'] == 1) { ?>
                        <tr>
                            <td class="thead">工作內容</td>
                            <td class="data"><?php echo $row['jobContent']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zdeposit'] == 1) { ?>
                        <tr>
                            <td class="thead">存款</td>
                            <td class="data"><?php echo $row['deposit']; ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($row['zhasloan'] == 1) { ?>
                        <tr>
                            <td class="thead">貸款</td>
                            <td class="data"><?php echo $row['hasloan']; ?></td>
                        </tr>
                    <?php } ?>

                    </tr>
                    <tr>
                        <td class='thead'>貸方簽名</td>
                        <td class='data'><?php echo '<img src="' . $row['sign'] . '" width=300px>' ?></td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    



        <!--頁尾-->

    </div>
</body>


</html>