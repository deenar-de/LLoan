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

		<div class="content">
			<h2>註冊-2</h2>
			<div class="wrapper">
				<form action="L_register3.php" method="post" enctype="multipart/form-data">
					<div class="loginBox">
						<div class="loginBoxCenter">

							<!--autofocus 規定當頁面載入時按鈕應當自動地獲得焦點。 -->
							<!-- placeholder提供可描述輸入欄位預期值的提示資訊-->
							<p>使用者名稱:<input type="radio" id="zname" name="zname" value="0" checked='checked'><label for="zname">不揭露</label>
								<input type="radio" id="zname" name="zname" value="1"><label for="zname">揭露</label></p>
							<p><input type="text" id="name" name="name" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="請輸入姓名" value="" /></p>
							<p><label for="radio">性別：<input type="radio" id="zgender" name="zgender" value="0" checked='checked'><label for="zgender">不揭露</label>
									<input type="radio" id="zgender" name="zgender" value="1"><label for="zgender">揭露</label></p>
							<p><input type="radio" name="gender" value="male" />男
								<input type="radio" name="gender" value="female" />女</p>
							<p>身分證ID:</p>
							<p><input type="text" id="id" name="id" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="身分證" value="" /></p>
							<p>電話：<input type="radio" id="zphone" name="zphone" value="0" checked='checked'><label for="zphone">不揭露</label>
								<input type="radio" id="zphone""" name="zphone" value="1"><label for="zphone">揭露</label></p>
							<p><input type="text" id="phone" name="phone" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="電話" value="" /></p>
							<p>戶籍地址：<input type="radio" id="zaddress1" name="zaddress1" value="0" checked='checked'><label for="zaddress1">不揭露</label>
								<input type="radio" id="zaddress1" name="zaddress1" value="1"><label for="zaddress1">揭露</label></p>
							<p><input type="text" id="address1" name="address1" class="loginInput" autofocus="autofocus" required="required" autocomplete="off" placeholder="戶籍地址" value="" /></p>
							<p>聯絡地址：<input type="checkbox" id="same" name="same" value="1">同戶籍地址
								<input type="radio" id="zaddress2" name="zaddress2" value="0" checked='checked'><label for="zaddress2">不揭露</label>
								<input type="radio" id="zaddress2" name="zaddress2" value="1"><label for="zaddress2">揭露</label></p>
							<p><input type="text" id="address2" name="address2" class="loginInput" autofocus="autofocus" autocomplete="off" placeholder="聯絡地址" value="" /></p>
							<p>身分證正面：<input type="radio" id="zidcard1" name="zidcard1" value="0" checked='checked'><label for="zidcard1">不揭露</label>
								<input type="radio" id="zidcard1" name="zidcard1" value="1"><label for="zidcard1">揭露</label></p>
							<p>
								<input type="file" name="idcard1" id="idcard1" required="required" />
							</p>
							<p>身分證反面：<input type="radio" id="zidcard2" name="zidcard2" value="0" checked='checked'><label for="zidcard2">不揭露</label>
								<input type="radio" id="zidcard2" name="zidcard2" value="1"><label for="zidcard2">揭露</label></p>
							<p>
								<input type="file" name="idcard2" id="idcard2" required="required" />
							</p>


							<!--     -->
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