<?php
// error_reporting(0);
$id = $_GET['id'];
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
if (!$db_link) die("資料庫選擇失敗！");
$id = $_GET['id'];
$sql_query = "SELECT * FROM `discuss`WHERE discussid='$id'";
$result = mysqli_query($db_link, $sql_query);
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
    if ($_POST['draw']=='0') {
        $sql_query = "UPDATE discuss SET comment='$_POST[comment]' WHERE discussid='$id'";
    } else {
        $sql_query = "UPDATE discuss SET comment='$_POST[comment]',draw='$_POST[draw]' WHERE discussid='$id'";
    }
    mysqli_query($db_link, $sql_query);
    header("Location: L_discuss.php");
}

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
        @import url("jquery-ui.min.css");
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@500&display=swap');
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
    </style>
    <script src="function.js"></script>
    <script src="signature/function.js"></script>
    <script src="signature/jquery-1.11.1.min.js"></script>
    <script src="signature/jquery-ui.min.js"></script>
    <script src="signature/jq-signature.min.js"></script>
    <script src="signature/jq-signature.js"></script>
    <script>
        if (getCookie('rStage') == 1) {
            alert('資料不完整，將導向至填寫頁面');
            location.replace('L_register2.php');
        } else if (getCookie('mId') == '') {
            alert('未登入，請重新登入');
            location.replace('L_login.html');
        }

        function show() {
            document.getElementById("block").style.visibility = "visible";
        }

        function back() {
            document.getElementById("block").style.visibility = "hidden";
        }
    </script>
</head>
<div class="full">

    <body>
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
                            <a href="./L_flow2.html">投資流程</a>
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
        <div class="content">
            <p style="margin-top:5%;margin-left:20%;margin-bottom:3%;font-size:2em;color:#577590"><strong>討論版</strong></p>
            <table class="discuss" style="width: 60%;">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $draw = $row['draw'];
                ?>
                    <form action="" method="post" name="formFix" id="formFix" enctype="multipart/form-data">
                        <tr>
                            <td class="trow">帳號</td>
                            <td class="trow"><?php echo $row['account'] ?></td>
                        </tr>
                        <tr>
                            <td class="trow">塗鴉</td>
                            <td class="trow"><?php echo '<img src="' . $row['draw'] . '" width=300px>' ?></td>
                        </tr>
                        <tr>
                            <td class="trow">內容</td>
                            <td class="trow"><textarea name="comment" id="comment" rows='4' style="width: 100%;"><?php echo $row['comment'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="hidden" id="draw" name="draw" value='0'>
                                <input name="action" type="hidden" value="update">
                                <input class="wi" type="button" value="塗鴉" onclick="show()" class="loginBtn">
                                <input class="wi" type="submit" name="button" id="button" value="更新資料">
                            </td>
                        </tr>
            </table>

        <?php } ?>
        </form>
        </table>
        <div id="block" style="position:fixed">
            <div style="width:100%;height:30% ;float:left;">
            </div>
            <div style="width:100%;height:40% ;float:left;">

                <div class='js-signature' style="height:200px;width:600px; margin:0px auto;background-color:white"></div>
            </div>
            <div style="width:100%;height:30% ;float:left;">
                <div style="height:100%;width:600px; margin:0px auto;text-align:center">
                    <button class="wi" id='1'>確認</button>
                    <button class="wi" onclick="back()">取消關閉</button>
                    <button class="wi" onclick="$('.js-signature').jqSignature('clearCanvas')">清除塗鴉</button>
                </div>
            </div>
        </div>
        </div>
        <script>
            $('.js-signature').jqSignature({
                width: 600,
                height: 200,
                border: '1px solid black',
                lineColor: 'black',
                lineWidth: 2
            });
        </script>
        <script>
            $('#1').click(function() {
                $('#draw').val($('.js-signature').jqSignature('getDataURL'));
                alert('已儲存');
                back();
            });
        </script>
</div>
<!-- </div> -->
<div style="width:100%; height:50px"></div>
<!--頁尾-->
<div class="footer">
    <p>Copyright 2020</p>
</div>

</body>
</div>

</html>
<?php while ($row = mysqli_fetch_assoc($result)) {
?>
    <table border="">
        <form action="" method="post" name="formFix" id="formFix" enctype="multipart/form-data">
            <tr>
                <td>帳號</td>
                <td><?php echo $row['account'] ?></td>
            </tr>
            <tr>
                <td>塗鴉</td>
                <td><?php echo '<img src="' . $row['draw'] . '" width=300px>' ?></td>
            </tr>
            <tr>
                <td>內容</td>
                <td><textarea name="comment" id="comment" rows='4'><?php echo $row['comment'] ?></textarea></td>
            </tr>
    </table>
    <input name="action" type="hidden" value="update">
    <input type="submit" name="button" id="button" value="更新資料">
<?php } ?>

</form>