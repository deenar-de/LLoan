<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$mId = $_COOKIE['mId'];
if (!$db_link) die("資料庫選擇失敗！");
$sql_query1 = "SELECT * FROM loan WHERE mId='$mId' AND progress=2";
$result1 = mysqli_query($db_link, $sql_query1);
$sql_query2 = "SELECT * FROM loandetail JOIN loan ON mId='$mId' AND loandetail.lId=loan.lId AND loandetail.end=0";
$result2 = mysqli_query($db_link, $sql_query2);
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
    <script>
        if (getCookie('rStage') == 1) {
            alert('資料不完整，將導向至填寫頁面');
            location.replace('L_register2.php');
        } else if (getCookie('rStage') == '') {
            alert('未登入，請重新登入');
            location.replace('L_login.html');
        }
    </script>
</head>

<body>
    <div class="full">
        <!--頁首-->
        <div id="header">
            <div class="img"><a href="LLoan_main.php"><img src="Logo.png" width="15%"></a>
                <div class="hh">
                    <a href="./LLoan_main.php" style="text-decoration:none;color:#3c2a1e">首頁</a>&nbsp;&nbsp;
                    <script>
                        if (getCookie('account') != '') {
                            document.write("<span class='inform'>" + getCookie('account') + "&nbsp;&nbsp;<a href='deletecookie.php' style='text-decoration:none;color:#3c2a1e'>登出</a></span>");
                        };
                    </script>
                </div>
            </div>


            <div id="nav">
                <ul>
                    <script>
                        if (getCookie('account') == '') {
                            document.write("<li class='dropdown'><a href='#'' class='dropbtn'>會員登入/註冊</a><div class='dropdown-content'><a href='./L_login.html'>會員登入</a><a href='./L_register.html'>註冊</a></div></li>")
                        } else {
                            document.write("<li class='dropdown'><a href='#'' class='dropbtn'>會員專區</a><div class='dropdown-content'><a href='memberinfo.php'>會員資訊</a><a href='listloan.php'>申貸資訊</a><a href='listInvest.php'>投資資訊</a><a href='myContract.php'>我的合約</a><a href='resetpw.php'>密碼修改</a></div></li>")
                        }
                    </script>
                    <li class="dropdown"><a href="#" class="dropbtn">互動討論版</a>
                        <div class="dropdown-content">
                            <a href="./L_discuss.php">討論版</a>

                        </div>
                    </li>
                    <li class="dropdown"><a href="#" class="dropbtn">我想投資</a>
                        <div class="dropdown-content">
                            <a href="#">投資流程</a>
                            <a href=wannaInvest.php>投資選單</a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="" class="dropbtn">我想申貸</a>
                        <div class="dropdown-content">
                            <a href="./L_flow.html">申貸流程</a>
                            <a href="./L_cal.html">貸款計算機</a>
                            <a href="wannaLoan.php">貸款申請</a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" class="dropbtn">關於我們</a>
                        <div class="dropdown-content">
                            <a href="./L_contact.html">聯絡我們</a>
                            <a href="./L_intro.html">認識L.LOAN</a>
                        </div>
                    </li>
                    <script>
                        if (getCookie('authority') == '0') {
                            document.write('<li class="dropdown"><a href="memberedit.php" class="dropbtn">會員管理</a></li>');
                        }
                    </script>
                </ul>
            </div>
        </div>
        <div style="width:100%; height:152px; float:left"></div>
        <p style="margin-top:5%;margin-left:20%;margin-bottom:3%;font-size:2em;color:#577590"><strong>我的合約</strong></p>
        <div class="content" align='center'>
            <table class="member member1">
                <tr>
                    <td class="thead" style="font-size:25px;text-align:left;">已結束</td>
                </tr>
                <tr>
                    <td class="thead">案件編號</td>
                    <td class="thead">期數</td>
                    <td class="thead">本金</td>
                    <td class="thead">利息</td>
                    <td class="thead">到期日</td>
                    <td class="thead">狀態</td>

                </tr>

                <?php while ($row = mysqli_fetch_assoc($result1)) {
                    $t = 'NT $' . $row['loan'] * 0.01 * $row['iRate'] * $row['period'];
                ?>
                    <tr>
                        <td class="data">A00<?php echo $row['lId'] ?></td>
                        <td class="data"><?php echo $row['period'] . '期' ?></td>
                        <td class="data">NT $<?php echo $row['loan'] ?></td>
                        <td class="data"><?php echo $t ?></td>
                        <td class="data"><?php echo date("Y-m-d ", ($row['endTime'])) ?></td>
                        <td class="data">已結案</td>
                    </tr>
                <?php } ?>
                </tr>

            </table>
            <table class="member member1">
                <tr>
                    <td class="thead" style="font-size: 25px;text-align:left;">進行中</td>
                </tr>
                <tr>
                    <td class="thead">案件編號</td>
                    <td class="thead">期數</td>
                    <td class="thead">應還款項</td>
                    <td class="thead">到期日</td>
                    <td class="thead">操作</td>

                </tr>

                <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
                    <tr>
                        <td class="data">A00<?php echo $row['lId'] ?></td>
                        <td class="data"><?php echo $row['pNum'] ?></td>
                        <td class="data">NT $<?php echo $row['money1'] + $row['money2'] ?></td>
                        <td class="data"><?php echo date("Y-m-d ", ($row['dl'])) ?></td>
                        <td class="data"><a href=gotopay.php?lId=<?php echo $row['lId'] ?>&pNum=<?php echo $row['pNum'] ?>><button>來還款</button></td>
                    </tr>
                <?php } ?>
                </tr>
            </table>
        </div>

        <script>
            window.onscroll = function() {
                myFunction()
            };

            var header = document.getElementById("header");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
        </script>


        <div style="width:100%; height:50px"></div>
        <!--頁尾-->
        <div class="footer">
            <p>Copyright 2020</p>
        </div>

</body>
</div>

</html>