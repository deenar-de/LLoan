<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$mId = $_COOKIE['mId'];
if (!$db_link) die("資料庫選擇失敗！");
$sql_query = "SELECT * FROM loan WHERE progress=0";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="function.js"></script>
</head>

<body>
    <div class="full">
        <!--頁首-->
        <div id="header">
            <div class="img"><a href="loanadmin.php"><img src="Logo.png" width="15%"></a>
                <div class="hh">
                    <script>
                        if (getCookie('account') != '') {
                            document.write("<span class='inform'>" + getCookie('account') + "&nbsp;&nbsp;<a href='deletecookie.php' style='text-decoration:none;color:#3c2a1e;'>登出</a></span>");
                        };
                    </script>
                </div>
            </div>


            <div id="nav">
                <ul>
                    <li class="dropdown"><a href="memberedit.php" class="dropbtn">會員管理</a>

                    </li>
                    <li class="dropdown"><a href="discussadmin.php" class="dropbtn">討論版管理</a>

                    </li>
                    <li class="dropdown"><a href="loanadmin.php" class="dropbtn">申貸管理</a>

                    </li>
                </ul>
            </div>
        </div>
        <div style="width:100%; height:152px; float:left"></div>
        <p style="margin-top:5%;margin-left:10%;margin-bottom:3%;font-size:2em;color:#577590"><strong>申貸管理</strong></p>
        <div class="content" align='center'>
            <table class="member">
                <tr>
                    <td class="thead">案件編號</td>
                    <td class="thead">貸款金額</td>
                    <td class="thead">利率</td>
                    <td class="thead">期數</td>
                    <td class="thead">詳細資料</td>
                    <td class="thead">狀態</td>
                    <td class="thead">操作</td>

                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="data">A00<?php echo $row['lId'] ?></td>
                        <td class="data"><?php echo $row['loan'] ?></td>
                        <td class="data"><?php echo $row['iRate'] ?>%</td>
                        <td class="data"><?php echo $row['period'] . '期' ?></td>
                        <td class="data"><a href="#" onclick="javascript:window.open('loandetail.php?lId=<?php echo $row['lId'] ?>&mId=<?php echo $row['mId'] ?>','','height=600,width=400,top=0,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')"><img src="search.jpg" style="width:30px; height:30px"></a></td>
                        <td class="data"><?php if ($row['ban'] == 0) { ?>
                                上架中</td>
                        <td class="data"><a href='ban.php?id=<?= $row['lId'] ?>&ca=2'><button class="ll">下架</button></a>
                        <?php } else { ?>
                            已下架</td>
                        <td class="data"><a href='unban.php?id=<?= $row['lId'] ?>&ca=2'><button class="ll">上架</button></a>
                        <?php } ?></td>
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
    </div>
</body>

</html>