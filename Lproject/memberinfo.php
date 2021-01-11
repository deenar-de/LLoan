<?php
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");
$id = $_COOKIE['mId'];
if ($_COOKIE['rStage'] == 1) {
	header('Location:L_register2.php');
} else if ($_COOKIE['rStage'] == 3) {
	$sql_query = "SELECT * FROM `member` NATURAL JOIN `mbank`,`mschool`,`mjob` WHERE member.mId='$id'AND member.mId='$id' AND mschool.mId='$id' AND mjob.mId='$id'";
	$result = mysqli_query($db_link, $sql_query); ?>

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
	<div class="full">

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
				<!-- <br><br><br> -->
				<p style="margin-top:5%;margin-left:20%;margin-bottom:3%;font-size:2em;color:#577590"><strong>會員資訊</strong></p>
				<div class="content">
					<?php while ($row = mysqli_fetch_assoc($result)) {
					?>
						<table style="border-collapse: collapse; width:90%" class="t">
							<form action="memberUpdate2.php?id=<?= $row['mId'] ?>&ca=2" method="post" name="formFix" id="formFix" enctype="multipart/form-data">
								<tr>
									<td class="thead">電子郵件</td>
									<td class="data"><input type="email" name="email" id="email" value="<?php echo $row['email'] ?>"></input></td>
									<td class="thead">就讀學校</td>
									<td class="data"><input type="text" name="school" id="school" value="<?php echo $row['school'] ?>"></input></td>
									<td class="thead">身分證正面</td>
									<td class="thead">身分證背面</td>


								</tr>
								<tr>
									<td class="thead">姓名</td>
									<td class="data"><input type="text" name="name" id="name" value="<?php echo $row['name'] ?>"></input></td>
									<td class="thead">系所</td>
									<td class="data"><input type="text" name="dep"" id=" dep" value="<?php echo $row['dep'] ?>"></input></td>
									<td rowspan='3' class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['idcard1'] . '" width=100px>' ?></td>
									<td rowspan='3' class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['idcard2'] . '"width=100px >' ?></td>

								</tr>
								<tr>
									<td class="thead">帳號</td>
									<td class="data"><input type="text" name="account" id="account" value="<?php echo $row['account'] ?>"></input></td>
									<td class="thead">年級</td>
									<td class="data"><select name="grade">
											<option value="大一" <?php if ($row['grade'] == '大一') echo 'SELECTED' ?>>大一</option>
											<option value="大二" <?php if ($row['grade'] == '大二') echo 'SELECTED' ?>>大二</option>
											<option value="大三" <?php if ($row['grade'] == '大三') echo 'SELECTED' ?>>大三</option>
											<option value="大四" <?php if ($row['grade'] == '大四') echo 'SELECTED' ?>>大四</option>
											<option value="碩一" <?php if ($row['grade'] == '碩一') echo 'SELECTED' ?>>碩一</option>
											<option value="碩二" <?php if ($row['grade'] == '碩二') echo 'SELECTED' ?>>碩二</option>
										</select>
									</td>

								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="thead">銀行代碼</td>
									<td class="data"><input type="text" name="bankCode" id="bankCode" value="<?php echo $row['bankCode'] ?>"></input></td>
									<td colspan=2 rowspan=1 class="data"></td>
								</tr>
								<tr>
									<td class="thead">註冊日期</td>
									<td class="data"><?php echo $row['rDate'] ?></input></td>
									<td class="thead">銀行名稱</td>
									<td class="data"><input type="text" name="bankName" id="bankName" value="<?php echo $row['bankName'] ?>"></input></td>
									<td class="data"><input type="file" name="idcard1" id="idcard1" /></td>
									<td class="data"><input type="file" name="idcard2" id="idcard2" /></td>

								</tr>
								<tr>
									<td class="thead">電話</td>
									<td class="data"><input type="text"" name=" phone" id="phone" value="<?php echo $row['phone'] ?>"></input></td>
									<td class="thead">分行</td>
									<td class="data"><input type="text" name="branch" id="branch" value="<?php echo $row['branch'] ?>"></input></td>
									<td class="thead">存摺相片</td>
									<td class="thead">學生證相片面</td>
								</tr>
								<tr>
									<td class="thead">性別</td>
									<td class="data"><input type="radio" name="gender" value="male" <?php if ($row['gender'] == 'male') echo ('checked="true"') ?> />男<input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') echo ('checked="true"') ?> />女 </td>
									<td class="thead">銀行帳號</td>
									<td class="data"><input type="text" name="bankAccount" id="bankAccount" value="<?php echo $row['bankAccount'] ?>"></input></td>
									<td rowspan=3 class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['bankbook'] . '"width=100px >' ?></td>
									<td rowspan=3 class="data"><?php echo '<img src="' . 'data:image/jpg;base64,' . $row['msCard'] . '"width=100px >' ?></td>

								</tr>
								<tr>
									<td class="thead">身分證字號</td>
									<td class="data"><input type="text" name="id" id="id" value="<?php echo $row['id'] ?>"></input></td>
									<td class="thead">貸款</td>
									<td class="data"><input type="number" id="hasloan" name="hasloan" style='width:70px' required="required" style="border-bottom-color:#FAF9F9" placeholder="" value="<?php echo $row['hasloan'] ?>" /></td>
								</tr>
								<tr>
									<td class="thead">戶籍地址</td>
									<td class="data"><input type="text" name="address1" id="address1" value="<?php echo $row['address1'] ?>"></input></td>
									<td class="thead">工作內容</td>
									<td class="data"><input type="text" name="jobContent" id="jobContent" value="<?php echo $row['jobContent'] ?>"></input></td>
								</tr>
								<tr>
									<td class="thead">通訊地址</td>
									<td class="data"><input type="text" name="address2" id="address2" value="<?php echo $row['address2'] ?>"></input></td>
									<td colspan="2"></td>
									<td class="data"><input type="file" name="bankbook" id="bankbook" /></td>
									<td class="data"><input type="file" name="mscard" id="mscard" /></td>
								</tr>
								<tr>
									<td class="thead">工作類型</td>
									<td class="data"><input type="radio" id="fp" name="fp" value="fulltime" <?php if ($row['fp'] == 'fulltime') {
																												echo ("checked='true'");
																											} ?>><label for="fp">正職</label><input type="radio" id="fp" name="fp" value="parttime" <?php if ($row['fp'] == 'parttime') {
																																																		echo ("checked='true'");
																																																	} ?>><label for="fp">打工</label>
									<td class="thead">薪水</td>
									<td class="data"><input type="number" id="salary"" name=" salary" style='width:70px' required="required" placeholder="" value="<?php echo $row['salary'] ?>" /></td>
									<td class="data"></td>
									<td class="data"></td>
								</tr>
								<tr>
									<td class="thead">年資</td>
									<td class="data"><input type="number" id="years" name="years" style='width:70px' required="required" placeholder="" value="<?php echo $row['years'] ?>" /></td>
									<td class="thead">職稱</td>
									<td class="data"><input type="text"" id=" job" name="job" style='width:70px' required="required" placeholder="職稱" value="<?php echo $row['job'] ?>" /></td>
									<td colspan=2 rowspan=1 class="data"></td>
								</tr>
								<tr>
									<td colspan="6" style="text-align: center;">
										<input name="action" type="hidden" value="update">
										<input class="wl" type="submit" name="button" id="button" value="更新資料" style="min-width: 5%;font-size:large">
									</td>
								</tr>
						</table>

					<?php } ?>

					</form>
				<?php   }
				?>

				</div>
				<!--頁尾-->
				<div style="width:100%; height:60px"></div>
				<div class="footer">
					<p>Copyright 2020</p>
				</div>

		</body>
	</div>

	</html>