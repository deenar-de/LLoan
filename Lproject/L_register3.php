<?php
session_start();
// error_reporting(0);
$file = fopen($_FILES['idcard1']['tmp_name'], 'r');
$fileContents = fread($file, filesize($_FILES['idcard1']['tmp_name']));
fclose($file);
$_SESSION['idcard1'] = base64_encode($fileContents);
$file2 = fopen($_FILES['idcard2']['tmp_name'], 'r');
$fileContents2 = fread($file2, filesize($_FILES['idcard2']['tmp_name']));
fclose($file2);
$_SESSION['idcard2'] = base64_encode($fileContents2);
$_SESSION['name'] = $_POST['name'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['id'] = $_POST['id'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address1'] = $_POST['address1'];
$_SESSION['zidcard1'] = $_POST['zidcard1'];
$_SESSION['zidcard2'] = $_POST['zidcard2'];
$_SESSION['zname'] = $_POST['zname'];
$_SESSION['zgender'] = $_POST['zgender'];
$_SESSION['zphone'] = $_POST['zphone'];
$_SESSION['zaddress1'] = $_POST['zaddress1'];
$_SESSION['zaddress2'] = $_POST['zaddress2'];
if ($_POST[''] = 1) {
	$_SESSION['address2'] = $_SESSION['address1'];
} else {
	$_SESSION['address2'] = $_POST['address2'];
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
			<h2>註冊-3-1</h2>
			<div class="wrapper">
				<form action="L_register3.5.php" method="post" enctype="multipart/form-data">
					<div class="loginBox">
						<div class="loginBoxCenter">

							<!--autofocus 規定當頁面載入時按鈕應當自動地獲得焦點。 -->
							<!-- placeholder提供可描述輸入欄位預期值的提示資訊-->
							<p>就讀學校:<input type="radio" id="zschool" name="zschool" value="0" checked='checked'><label for="zschool">不揭露</label>
								<input type="radio" id="zschool" name="zschool" value="1"><label for="school">揭露</label></p>
							<p><input type="text" id="school" name="school" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="就讀學校" value="" /></p>
							<p>就讀科系:<input type="radio" id="zdep" name="zdep" value="0" checked='checked'><label for="zdep">不揭露</label>
								<input type="radio" id="zdep" name="zdep" value="1"><label for="zdep">揭露</label></p>
							<p><input type="text" id="dep" name="dep" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="就讀科系" value="" /></p>
							<p>年級:<input type="radio" id="zgrade" name="zgrade" value="0" checked='checked'><label for="zgrade">不揭露</label>
								<input type="radio" id="zgrade" name="zgrade" value="1"><label for="zgrade">揭露</label></p>
							<p>
								<select name="grade">
									<option value="大一">大一</option>
									<option value="大二">大二</option>
									<option value="大三">大三</option>
									<option value="大四">大四</option>
									<option value="碩一">碩一</option>
									<option value="碩二">碩二</option>
								</select>
							</p>
							<p>學生證照片:<input type="radio" id="zmscard" name="zmscard" value="0" checked='checked'><label for="zmscard">不揭露</label>
								<input type="radio" id="zmscard" name="zmscard" value="1"><label for="zmscard">揭露</label></p>
							<p>
								<input type="file" name="mscard" id="mscard" />
							</p>
						</div>
						<div class="loginBoxButtons">
							<button type="reset" class="loginBtn">重置</button>
							<button class="loginBtn">下一頁</button>
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