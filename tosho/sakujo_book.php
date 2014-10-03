<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }
?>
<!DOCTYPE>
<html>
 <head>
 <title>新規ユーザ登録</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <link rel="stylesheet" href="style3.css" type="text/stylesheet" /> 
 </head>
 <body id="back">
	<div id="header">
		<div id="header_box1">
  　削除
		</div>
			<div id="header_box2">
   各項目にデータを入力
			</div>
	</div>

	<div id="container1">
		<div id="container2">
    <form action="sakujo_book_kanryo.php" method="POST">
     書籍ＩＤ<input type="text" name="book_id" /><br/>
     <!--名前<input type="text" name="shinki_name" /><br/>-->
     書籍名<input type="text" name="title" /><br/>
     カテゴリ<input type="text" name="category" /><br/>
     著者<input type="text" name="author" /><br/>
		</div>
	</div>

	<div id="footer">
     <input type="submit" value="削除"/>
     <input type="reset" value="消去" />
     <a href="main_admin.php"><input type="button" value="戻る" /></a>
     <a href="logout.php"><input type="button" value="ログアウト" /></a>
    </form>
	</div>
 </body>
</html>


