<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$sql_query = "SELECT * FROM loan WHERE progress=2";
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
			<div class="img"><a href="LLoan_main.php"><img src="Logo.png" width="15%"></a>
				<div class="hh">
					<a href="./LLoan_main.php" style="text-decoration:none;color:#3c2a1e;">首頁</a>&nbsp;&nbsp;
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
		<div class="content" align="center">
		
			<div class="contentpic">
				<div class="coverflow">
					<a href="L_register.html"><img src="L-loan2.png"></a>
					<a href="L_register.html"><img src="LLoan-1.png"></a>
					<a href="L_register.html"><img src="lloan3.png"></a>
				</div>
			</div>
			<div class="buffer">
				<div class="middle">
					<div class="flip-1">特色一</div>
					<div class="panel-11 panel2">LLoan提供自選利率<br>讓您輕鬆貸!</div>
				</div>
				<script>
					$(".flip-1").click(function() {
						$(".panel-11").slideToggle("slow");
					});
				</script>

				<div class="middle">
					<div class="flip-2">特色二</div>
					<div class="panel-22 panel2">專屬於大專生的<br>借貸平台</div>
				</div>
				<script>
					$(".flip-2").click(function() {
						$(".panel-22").slideToggle("slow");
					});
				</script>

				<div class="middle">
					<div class="flip-3">特色三</div>
					<div class="panel-33 panel2">發揮公益價值，小額資助需要的年輕人</div>
				</div>
				<script>
					$(".flip-3").click(function() {
						$(".panel-33").slideToggle("slow");
					});
				</script>

				<div class="middle">
					<div class="flip-4">特色四</div>
					<div class="panel-44 panel2">培養學生時刻維護自身信用價值觀</div>
				</div>
				<script>
					$(".flip-4").click(function() {
						$(".panel-44").slideToggle("slow");
					});
				</script>
			</div>

			<table class="member">
				<tr>
					<td class="thead">案件編號</td>
					<td class="thead">貸款金額</td>
					<td class="thead">利率</td>
					<td class="thead">期數</td>
					<td class="thead">詳細資料</td>
					<td class="thead">狀態</td>

				</tr>

				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td class="data">A00<?php echo $row['lId'] ?></td>
						<td class="data"><?php echo $row['loan'] ?></td>
						<td class="data"><?php echo $row['iRate'] ?>%</td>
						<td class="data"><?php echo $row['period'] . '期' ?></td>
						<td class="data"><span><a href="#" onclick="javascript:window.open('loandetail.php?lId=<?php echo $row['lId'] ?>&mId=<?php echo $row['mId'] ?>','','height=600,width=600,top=0,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')"><img src="search.jpg" style="width:30px; height:30px"></a></span></td>
						<td class="data"><?php
											switch ($row['progress']) {
												case 0:
													$lId = $row['lId'];
													echo ("<a href=invest1.php?lId=$lId><button>我要投資</button></a>");
													break;

												case 1:
													echo ('進行中');
													break;

												case 2:
													echo ('已結案');
											}
											?></td>
					</tr>
				<?php } ?>
				</tr>

			</table>

		</div>

		<div style="width:100%; height:50px"></div>									
		<!--頁尾-->
		<div class="footer">
			<p>Copyright 2020</p>
		</div>
	</div>
</body>

</html>