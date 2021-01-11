<?php
session_start();
// error_reporting(0);
$file = fopen($_FILES['mscard']['tmp_name'], 'r');
$fileContents = fread($file, filesize($_FILES['mscard']['tmp_name']));
fclose($file);
$_SESSION['mscard'] = base64_encode($fileContents);
$_SESSION['school'] = $_POST['school'];
$_SESSION['dep'] = $_POST['dep'];
$_SESSION['grade'] = $_POST['grade'];
$_SESSION['zmscard'] = $_POST['zmscard'];
$_SESSION['zschool'] = $_POST['zschool'];
$_SESSION['zdep'] = $_POST['zdep'];
$_SESSION['zgrade'] = $_POST['zgrade'];
$_SESSION['rmode'] = 3;
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
			<h2>註冊-3-2</h2>
			<div class="wrapper">
				<form action="L_register4.php" method="post">
					<div class="loginBox">
						<div class="loginBoxCenter">
							<p>工作：<input type="radio" id="zfp" name="zfp" value="0" checked='checked'><label for="zfp">不揭露</label>
								<input type="radio" id="zfp" name="zfp" value="1"><label for="zfp">揭露</label><br>
								<input type="checkbox" id="fp" name="fp" value="fulltime">
								<label for="fp">正職</label>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="fp" name="fp" value="parttime">
								<label for="fp">打工</label><br>
							</p><br>
							<p>月薪：<input type="radio" id=zsalary name=zsalary value="0" checked='checked'><label for=zsalary>不揭露</label>
								<input type="radio" id=zsalary name=zsalary value="1"><label for=zsalary>揭露</label></p>
							<p><input type="number" id="salary"" name=" salary" style='width:70px' required="required" placeholder="" value="" /></p>
							<p>年資(月)：<input type="radio" id=zyears name=zyears value="0" checked='checked'><label for=zyears>不揭露</label>
								<input type="radio" id=zyears name=zyears value="1"><label for=zyears>揭露</label></p>
							<p><input type="number" id="years" name="years" style='width:70px' required="required" placeholder="" value="" /></p>
							<p>職稱:<input type="radio" id="zjob" name="zjob" value="0" checked='checked'><label for="zjob">不揭露</label>
								<input type="radio" id="zjob" name="zjob" value="1"><label for="zjob">揭露</label></p>
							<p><input type="text"" id=" job" name="job" style='width:70px' required="required" placeholder="職稱" value="" />
							</p>
							<p>工作內容:<input type="radio" id=zjobContent name=zjobContent value="0" checked='checked'><label for=zjobContent>不揭露</label>
								<input type="radio" id=zjobContent name=zjobContent value="1"><label for=zjobContent>揭露</label></p>
							<p><textarea name="jobContent" id="jobContent" rows='1' cols='30.5'></textarea></p>
							<p>存貸款(沒有填0):</p>
							<p>存款:<input type="radio" id=zdeposit name=zdeposit value="0" checked='checked'><label for=zdeposit>不揭露</label>
								<input type="radio" id=zdeposit name=zdeposit value="1"><label for=zdeposit>揭露</label></p>
							<p><input type="number" id="deposit"" name=" deposit" style='width:70px' required="required" placeholder="" value="" /></p>
							<p>貸款:<input type="radio" id=zhasloan name=zhasloan value="0" checked='checked'><label for=zhasloan>不揭露</label>
								<input type="radio" id=zhasloan name=zhasloan value="1"><label for=zhasloan>揭露</label></p>
							<p><input type="number" id="hasloan" name="hasloan" style='width:70px' required="required" placeholder="" value="" /></p>
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