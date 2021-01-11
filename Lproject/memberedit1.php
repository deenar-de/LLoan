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
		<p style="margin-top:10%;margin-left:30%;margin-bottom:5%;font-size:2em;color:#577590"><strong>會員管理</strong></p>
  		<div class="content" align='center'>
  			<?php
				header("Content-Type: text/html; charset=utf-8");
				include("connMysql.php");
				error_reporting(0);
				if (!$db_link) die("資料庫選擇失敗！");
				$sql_query = "SELECT * FROM member WHERE identify=0";
				$result = mysqli_query($db_link, $sql_query);
				echo "<p style='margin-left:4%;margin-bottom:1%;font-size:1.5em;color:#577590'>簡易註冊者<table class='member' align='center'><tr><td class='thead'>姓名</td><td width='100' class='thead'>帳號</td><td class='thead'>操作</td></tr>";
				while ($row = mysqli_fetch_assoc($result)) { ?>
  				<tr>
  					<td class="data"><?php echo $row['name'] ?></td>
  					<td class="data"><?php echo $row['account'] ?></td>
  					<td class="data"><a href='delete.php?id=<?= $row['mId'] ?>&ca=1'><button>刪除</button></a>
  						<?php if ($row['ban'] == 0) { ?>
  							<a href='ban.php?id=<?= $row['mId'] ?>&ca=1'><button>封鎖</button></a>
  						<?php } else { ?>
  							<a href='unban.php?id=<?= $row['mId'] ?>&ca=1'><button>解除封鎖</button></a>
  						<?php } ?>
  					</td>
  				</tr>

  			<?php } ?>
  			</table>
  			<?php $sql_query = "SELECT DISTINCT member.ban AS ban,name,imId,account FROM member JOIN loan ON member.mId=loan.imId ";
				$result = mysqli_query($db_link, $sql_query);
				echo "<p style='margin-bottom:1%;font-size:1.5em;color:#577590'>借方<table class='member' align='center'><tr><td class='thead'>姓名</td><td width='100' class='thead'>帳號</td><td class='thead'>操作</td></tr>";
				while ($row = mysqli_fetch_assoc($result)) { ?>
  				<tr>
  					<td class="data"><?php echo $row['name'] ?></td>
  					<td class="data"><?php echo $row['account'] ?></td>
  					<td class="data"><a href='delete.php?id=<?= $row['imId'] ?>&ca=1'><button>刪除</button></a>
  						<?php if ($row['ban'] == 0) { ?>
  							<a href='ban.php?id=<?= $row['imId'] ?>&ca=1'><button>封鎖</button></a>
  						<?php } else { ?>
  							<a href='unban.php?id=<?= $row['imId'] ?>&ca=1'><button>解除封鎖</button></a>
  						<?php } ?>
  					</td>
  				</tr>


  			<?php } ?>
  			</table>
  			<?php $sql_query = "SELECT DISTINCT member.ban AS ban,name, member.mId AS mId,account FROM member JOIN loan ON member.mId=loan.mId ";
				$result = mysqli_query($db_link, $sql_query);
				echo "<p style='margin-bottom:1%;font-size:1.5em;color:#577590'>貸方<table class='member' align='center'><tr><td class='thead'>姓名</td><td width='100' class='thead'>帳號</td><td class='thead'>操作</td></tr>";
				while ($row = mysqli_fetch_assoc($result)) { ?>
  				<tr>
  					<td class="data"><?php echo $row['name'] ?></td>
  					<td class="data"><?php echo $row['account'] ?></td>
  					<td class="data"><a href='delete.php?id=<?= $row['mId'] ?>&ca=1'><button>刪除</button></a>
  						<?php if ($row['ban'] == 0) { ?>
  							<a href='ban.php?id=<?= $row['mId'] ?>&ca=1'><button>封鎖</button></a>
  						<?php } else { ?>
  							<a href='unban.php?id=<?= $row['mId'] ?>&ca=1'><button>解除封鎖</button></a>
  						<?php } ?>
  					</td>
  				</tr>
  			<?php } ?>
  			</table><br><br><br><br>



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

  </body>

  </html>