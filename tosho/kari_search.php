<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }

 if($_SESSION['id']==1){
  $modoru="main_admin.php";
 }  else{
  $modoru="main.php";
 }

?>
<!DOCTYPE>
<html>
 <head>
 <title>借りる本を検索</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <link rel="stylesheet" href="style3.css" type="text/css">
 </head>
 <body id="back">
	<div id="header">
		<div id="header_box1">
   借りる本を検索
		</div>
			<div id="header_box2">
  検索項目
			</div>
	</div>

	<div id="container1">
		<div id="container2">
    <form  action="kari_kekka.php" method="POST">
     図書ID：<input type="text" name="shoseki_id"/><div id="err1"></div></br>
     書籍名：<input type="text" name="title"/><div id="err1"></div></br>
		</div>
	</div>

	<div id="footer">
	     <input type="submit" value="検索" />
	     <input type="reset" value="クリア"/>
	     <a href="<?php echo $modoru; ?>"><input type="button" value="戻る" /></a>
	     <a href="logout.php"><input type="button" value="ログアウト" /></a>
    </form>
	</div>
 </body>
</html>
