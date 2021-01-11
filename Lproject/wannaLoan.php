<!DOCTYPE html>
<meta charset="UTF-8" />
<html>
<title>首頁</title>
<?php
session_start();
?>

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
        var sign;
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
                    <a href="./LLoan_main.php" style="text-decoration:none;color:#3c2a1e;">首頁</a>&nbsp;&nbsp;
                    <script>
                        if (getCookie('account') != '') {
                            document.write("<span class='inform'>" + getCookie('account') + "&nbsp;&nbsp;<a href='deletecookie.php' style='text-decoration:none;color:#3c2a1e;'>登出</a></span>");
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
                            <a href="wannaloan.php">貸款申請</a>
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
        <br><br><br><br><br><br><br><br><br>

        <div style="margin-right:250px;" class="content">
            <script>
                function show() {
                    document.getElementById("block").style.visibility = "visible";
                }

                function back() {
                    document.getElementById("block").style.visibility = "hidden";
                }

                function showbu() {
                    document.getElementById("submit").style.visibility = "visible";
                }
            </script>
            <form action="wannaLoan1.php" method="post" enctype="multipart/form-data" style="margin: 10px;">
                <table class="forloan">

                    <!--autofocus 規定當頁面載入時按鈕應當自動地獲得焦點。 -->
                    <!-- placeholder提供可描述輸入欄位預期值的提示資訊-->
                    <tr class="tthead">
                        <th>我要申貸 go go~</th>
                    </tr>
                    <tr class="tttdata">
                        <td>申貸用途：</td>
                    </tr>
                    <tr class="ttdata">
                        <td><input type="text" id="reason" name="reason" class="loginInput" style="font-size: medium;border-width:1.5px; width: 40%;padding: 10px;" autofocus="autofocus" required="required" autocomplete="off" placeholder="用途" value="" /></td>
                    </tr>
                    <tr class="tttdata">
                        <td>申貸金額：</td>
                    </tr>
                    <tr class="ttdata">
                        <td><input type="number" id="loan" name="loan" autofocus="autofocus" required="required" autocomplete="off" min='0' max='10000' style="font-size: medium;border-width:1.5px; width: 40%;padding: 5px;"></td>
                    </tr>
                    <!-- required 規定必需在提交之前填寫輸入欄位-->
                    <tr class="tttdata">
                        <td>申貸期數：</td>
                    </tr>
                    <tr class="ttdata">
                        <td>
                            <select name="period" style="font-size: medium;border-width:1.5px;padding: 5px;">
                                <option value="3">3期</option>
                                <option value="6">6期</option>
                                <option value="9">9期</option>
                                <option value="12">12期</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="tttdata">
                        <td>申貸用途描述:</td>
                    </tr>
                    <tr class="ttdata">
                        <td class="ttdata"><textarea name='description' id='description' cols='100' rows='5' style="font-size: medium;border-width:1.5px"></textarea></td>
                    </tr>
                    <tr class="tttdata">
                        <td>利率:</td>
                    </tr>
                    <tr class="ttdata">
                        <td><input type="number" id="iRate" name="iRate"  style="font-size: medium;border-width:1.5px;padding: 5px;" required="required" placeholder="利率" step="0.01" min='0' max='1' />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="tttdata">
                        <td><input class="wl" type="reset"  style="margin-left:5%">
                            <input class="wl" type='button' onclick="show()" value='簽名'>
                            <input class="wl" id='submit' type="submit" value="送出資料" style="visibility:hidden">
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="sign" id="sign" required="required">

            </form>
            <div id="block">
                <div style="width:100%;height:30% ;float:left;">
                </div>
                <div style="width:100%;height:40% ;float:left;">

                    <div class='js-signature' style="height:200px;width:600px; margin:0px auto;background-color:white"><p style="color:green; font-weight:900; text-align:center; font-size:larger">合約簽訂&nbsp;&nbsp;&nbsp;請在此簽名</p><br><p style="color:green; font-weight:900; text-align:center">依電子簽章法<br>電子簽章具法定效力
，簽訂合約後代表您同意其細節內容</p></div>
                </div>
                <div style="width:100%;height:30% ;float:left">
                    <div style="height:100%;width:600px; margin:0 auto;text-align:center">
                        <button class="wl" class="confirm" id='1' onclick='showbu()'>確認</button>
                        <button class="wl" onclick="back()">取消關閉</button>
                        <button class="wl" onclick="$('.js-signature').jqSignature('clearCanvas')">清除簽名</button>
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
                $('#sign').val($('.js-signature').jqSignature('getDataURL'));
                alert('已確認');
                showbu();
                back();
            });
        </script>



        <div style="width:100%; height:50px"></div>
        <!--頁尾-->
        <div class="footer">
            <p>Copyright 2020</p>
        </div>
    </div>
</body>


</html>