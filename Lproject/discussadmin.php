<?php
error_reporting(0);
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
if (!$db_link) die("資料庫選擇失敗！");
$sql_query = "SELECT * FROM discuss";
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
    <script>
        if (getCookie('rStage') == 1) {
            alert('資料不完整，將導向至填寫頁面');
            location.replace('L_register2.php');
        } else if (getCookie('mId') == '') {
            alert('未登入，請重新登入');
            location.replace('L_login.html');
        }
    </script>
</head>


    <body>
      
            <div class="full">
                <!--頁首-->
                <div id="header">
                    <div class="img"><a href="loanadmin.php"><img src="Logo.png" width="15%"></a>
                        <div class="hh">
                            <script>
                                if (getCookie('account') != '') {
                                    document.write("<span class='inform'>" + getCookie('account') + "&nbsp;&nbsp;<a href='deletecookie.php' style='text-decoration:none;color:#3c2a1e'>登出</a></span>");
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
                <!-- <br><br><br> -->
                <div style="width:100%; height:152px; float:left"></div>
                <div class="content">
                    <h1>討論版管理</h1>
                    <table class="discuss">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class="trow">
                                    <p style="font-size:1.5em"><strong><?php echo $row['account'] ?></strong></p>&nbsp;&nbsp;
                                    <?php echo $row['comment'] ?>&nbsp;&nbsp;
                                    <?php echo $row['time'] ?>&nbsp;&nbsp;

                                </td>
                                <td class="trow">
                                    <?php echo '<img src="' . $row['draw'] . '" width=300px>' ?>
                                </td>
                                <td class="row"><a href='delete.php?id=<?= $row['discussid'] ?>&ca=4'><button class="ll">刪除</button></a></td>

                            </tr>
                        <?php } ?>
                    </table><br><br><br><br><br>
                </div>




                <div style="width:100%; height:50px"></div>
                <!--頁尾-->
                <div class="footer">
                    <p>Copyright 2020</p>
                </div>
			</div>
    </body>


</html>