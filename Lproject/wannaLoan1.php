<?php
session_start();
$_SESSION['reason'] = $_POST['reason'];
$_SESSION['loan'] = $_POST['loan'];
$_SESSION['period'] = $_POST['period'];
$_SESSION['iRate'] = $_POST['iRate'];
$_SESSION['description'] = $_POST['description'];
$_SESSION['sign'] = $_POST['sign'];
if($_POST['sign']==NULL){

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
                            document.write("<span class='inform'>" + getCookie('account') + "&nbsp;&nbsp;<a href='deletecookie.php' style='text-decoration:none;color:#3c2a1e'>登出</a></span></a>&nbsp;&nbsp;");
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
                            <a href="wannaInvest.php">投資選單</a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" class="dropbtn">我想申貸</a>
                        <div class="dropdown-content">
                            <a href="./L_flow.html">申貸流程</a>
                            <a href="./L_cal.html">貸款計算機</a>
                            <a href="#">貸款申請</a>
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
            <form action="insertLoan.php" method="post">
                <p style="margin-top:5%;margin-left:20%;margin-bottom:3%;font-size:2em;color:#577590"><strong>申貸確認</strong></p>
                <table class="check">
                    <tr>
                        <th>申貸用途：</th>
                        <td><?php echo $_SESSION['reason'] ?></td>
                    </tr>
                    <tr>
                        <th>申貸金額：</th>
                        <td><?php echo $_SESSION['loan'] ?></td>
                        </td>
                    </tr>
                    <tr>
                        <th>期數：</th>
                        <td><?php echo $_SESSION['period'] ?></td>
                    </tr>
                    <tr>
                        <th>申貸用途描述：</th>
                        <td><?php echo $_SESSION['description'] ?></td>
                    </tr>
                    <tr>
                        <th>利率：</th>
                        <td><?php echo $_SESSION['iRate'] ?></td>
                    </tr>
                    <tr>
                        <th>簽名 : </th>
                        <td> <?php echo '<img src="' . $_SESSION['sign'] . '" width=300px>' ?></td>
                    </tr>
                    

                </table>


                <!--autofocus 規定當頁面載入時按鈕應當自動地獲得焦點。 -->
                <!-- placeholder提供可描述輸入欄位預期值的提示資訊-->
                <a href="insertLoan.php" style="margin-left:50%"><button class="wl">送出資料</button></a>
            </form>

        </div>
        <div style="width:100%; height:50px"></div>
        <!--頁尾-->
        <div style="width:100%; height:50px"></div>
        <div class="footer">
            <p>Copyright 2020</p>
        </div>
    </div>
</body>


</html>