<?php
session_start();
// error_reporting(0);
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$_SESSION['deposit'] = $_POST['deposit'];
$_SESSION['hasloan'] = $_POST['hasloan'];
$_SESSION['fp'] = $_POST['fp'];
$_SESSION['salary'] = $_POST['salary'];
$_SESSION['years'] = $_POST['years'];
$_SESSION['job'] = $_POST['job'];
$_SESSION['jobContent'] = $_POST['jobContent'];
$_SESSION['zdeposit'] = $_POST['zdeposit'];
$_SESSION['zhasloan'] = $_POST['zhasloan'];
$_SESSION['zfp'] = $_POST['zfp'];
$_SESSION['zsalary'] = $_POST['zsalary'];
$_SESSION['zyears'] = $_POST['zyears'];
$_SESSION['zjob'] = $_POST['zjob'];
$_SESSION['zjobContent'] = $_POST['zjobContent'];
$mId = $_COOKIE['mId'];
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$sql_query = "SELECT * FROM member WHERE mId='$mId'";
$result = mysqli_query($db_link, $sql_query);
$row = mysqli_fetch_assoc($result);
$rStage = $row['rStage'];
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
		
		<div class="content">
			<h2>註冊-4</h2>
			<div class="wrapper"">
				<form action="register.php" method="post" enctype="multipart/form-data">
					<div class="loginBox">
						<div class="loginBoxCenter">
							<!--autofocus 規定當頁面載入時按鈕應當自動地獲得焦點。 -->
							<!-- placeholder提供可描述輸入欄位預期值的提示資訊-->
							<?php if ($rStage == 1) { ?>
								<p>銀行代碼：<input type="radio" id=zbankCode name=zbankCode value="0" checked='checked'><label for=zbankCode>不揭露</label>
									<input type="radio" id=zbankCode name=zbankCode value="1"><label for=zbankCode>揭露</label></p>
								<p><input type="text" id="bankCode" name="bankCode" class="loginInput2" autofocus="autofocus" required="required" autocomplete="off" placeholder="銀行代碼" value="" /></p>
								<p>銀行名稱:<input type="radio" id=zbankName name=zbankName value="0" checked='checked'><label for=zbankName>不揭露</label>
									<input type="radio" id=zbankName name=zbankName value="1"><label for=zbankName>揭露</label></p>
								<p><input type="text" id="bankName" name="bankName" class="loginInput2" autofocus="autofocus" required="required" autocomplete="off" placeholder="銀行名稱" value="" /></p>
								<p>分行:<input type="radio" id=zbranch name=zbranch value="0" checked='checked'><label for=zbranch>不揭露</label>
									<input type="radio" id=zbranch name=zbranch value="1"><label for=zbranch>揭露</label></p>
								<p><input type="text" id="branch" name="branch" class="loginInput2" autofocus="autofocus" required="required" autocomplete="off" placeholder="分行" value="" /></p>
								<p>銀行帳號：<input type="radio" id=zbankAccount name=zbankAccount value="0" checked='checked'><label for=zbankAccount>不揭露</label>
									<input type="radio" id=zbankAccount name=zbankAccount value="1"><label for=zbankAccount>揭露</label></p>
								<p><input type="text" id="bankAccount" name="bankAccount" class="loginInput3" autofocus="autofocus" required="required" autocomplete="off" placeholder="銀行帳號" value="" /></p>
								<p>存摺封面：<input type="radio" id=zbankbook name=zbankbook value="0" checked='checked'><label for=zbankbook>不揭露</label>
									<input type="radio" id=zbankbook name=zbankbook value="1"><label for=zbankbook>揭露</label></p>
								<p><input type="file" name="bankbook" required="required" /></p>
							<?php } ?>
						</div>
						<div class="loginBoxButtons">
							<button type="reset" class="loginBtn">重置</button>
							<button class="loginBtn">送出資料</button>
						</div>
					</div>
				</form>
			</div>
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