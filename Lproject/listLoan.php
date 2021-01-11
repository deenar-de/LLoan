<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$mId = $_COOKIE['mId'];
if (!$db_link) die("資料庫選擇失敗！");
$sql_query = "SELECT * FROM loan WHERE mId='$mId' AND progress=0";
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
								<a href="#">投資流程</a>
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
			<p style="margin-top:5%;margin-left:20%;margin-bottom:3%;font-size:2em;color:#577590"><strong>申貸資訊</strong></p>
			<div class="content" align='center'>
				<table class="member member1">
					<tr>
						<td class="thead">案件編號</td>
						<td class="thead">貸款金額</td>
						<td class="thead">利率</td>
						<td class="thead">期數</td>
						<td class="thead">詳細資料</td>
						<td class="thead">狀態</td>
						<td class="thead">操作</td>

					</tr>

					<?php while ($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<td class="data">A00<?php echo $row['lId'] ?></td>
							<td class="data"><?php echo $row['loan'] ?></td>
							<td class="data"><?php echo $row['iRate'] ?>%</td>
							<td class="data"><?php echo $row['period'] . '期' ?></td>
							<td class="data"><a href="#" onclick="javascript:window.open('loandetail.php?lId=<?php echo $row['lId'] ?>&mId=<?php echo $row['mId'] ?>','','height=600,width=600,top=0,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')"><img src="search.jpg" style="width:30px; height:30px"></a></td>
							<td class="data"><?php if ($row['ban'] == 0) {
													echo ('上架中');
												} else {
													echo ('已下架，請聯絡管理員');
												} ?></td>
							<td class="data"><a href=delete.php?id=<?php echo $row['lId'] ?>&ca=3><button class="ll">刪除</button></a></td>
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