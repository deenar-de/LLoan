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
					<li class="dropdown"><a href="memberedit.php" class="dropbtn">會員</a>
						
					</li>
					<li class="dropdown"><a href="discussadmin.php" class="dropbtn">討論版</a>
						
					</li>
					<li class="dropdown"><a href="loanadmin.php" class="dropbtn">申貸</a>
						
					</li>
				</ul>
			</div>
		</div>

		<div class="content">
			<h1>版規</h1>

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



		<!--頁尾-->
		<div class="footer">
			<p>Copyright 2020</p>
		</div>
	</div>
</body>

</html>