<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }
?>
<!DOCTYPE>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> -->
<html>
 <head>
 <title>図書管理システム</title>
 <link rel="stylesheet" href="style2.css" type="text/css" />
 <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <link href="css/bootstrap.min.css" rel="stylesheet" />
 <script type="text/javascript" src="./kadai1.js"></script>
 </head>
 <body id="back">
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<div id="header">
		<div id="header_box1">
     管理者用メインメニュー
			<div id="header_box2">
			説明			
			</div>
		</div>
	</div>

	<div id="container">
		<div id="container_element">
	<a href="kari_search.php">本を借りる</a>
		</div>
		<div id="container_element">
	<a href="kaesi_search.php">本を返す</a>
		</div>
		<div id="container_element">
	<a href="itiran_book.php">貸出状況を確認する</a>
		</div>
		<div id="container_element">
	<a href="shinki_user.php">ユーザを追加する</a>
		</div>
		<div id="container_element">
	<a href="logout.php">ログアウト</a>
		</div>
        <!--<div id="tag4">
	<a href="all.php">本を検索する</a>
        </div> -->
	 </div>

  <!-- le resultat de phpinfo() ne s'affiche pas. -->
  <?php
  /*echo "<p>bonjourfjsd</p>"; 
  error_reporting(E_ALL);
  ini_set("dis",1);

   $bd=mysql_connect("127.0.0.1","root","agreable2");
   mysql_select_db('tosho',$bd);

   $requ='select * from uza';
   $resu=mysql_query($requ) or die();
   
   $cou=0;

   while($row=mysql_fetch_array($resu)){
	if($row[0]==$_POST['ident'] && $row[1]==$_POST['pass'])
	if($cou==0){
	 echo "<table border=\"1\" color=\"black\" >";
	 }

	if(row[0]==$_POST['ident'] && $row[1]==$_POST['pass'])
	echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
	$cou++;
   }
   echo "</table>";
   login procedure 
   mysql_free_result($resu);
   mysql_close($bd);*/
  ?> 

	<div id="footer">
     copryright(c) video collection,all rights reserved.
	</div>
 </body>
</html>
