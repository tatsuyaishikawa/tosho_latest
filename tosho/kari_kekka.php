<!DOCTYPE>
<html>
 <head>
 <title>図書管理システム</title>
 <link type="text/css" rel="stylesheet" href="style4.css" />
 <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <script type="text/javascript" src="javasc.js"></script>
 <!-- ce procedure est effectue pour enregistrer l'info de livre -->
 </head>
 
 <body id="back" onload="desactive_kari()">
	<div id="container1">
   検索結果一覧
  <form action="kari_kanryo.php" method="POST">	
   <input type="submit" value="借りる" id="valide" />
   <input type="reset" value="取り消し" />
   <a href="kari_search.php"><input type="button" value="戻る" /></a>
   <a href="logout.php"><input type="button" value="ログアウト"/></a>
  </form>
		<div id="container2">
<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }

 $cou=0; /*一回目のみ<table>をechoで表示する*/ 
 $gaito=0;/*一冊も街頭する書籍がない場合を判定する*/
 $db=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$db);

 /* 本が存在するかを確認*/
 $requ='select * from books';
 $apre=mysql_query($requ);

 while($row=mysql_fetch_array($apre)){
   if($cou==0){
    echo "<table border=\"10\" color=\"black\">";
    echo "<tr><td>書籍ID</td><td>書籍名</td><td>分類</td><td>著者名</td><td>貸出状況</td></tr>";
   }

   if($row[0]==$_POST['shoseki_id']){
    echo "<tr>
     <td>".$row[0]."</td>
     <td>".$row[1]."</td>
     <td>".$row[2]."</td>
     <td>".$row[3]."</td>
     <td id=\"statu\">".$row[4]."</td>
     </tr>";
    
    $gaito++;
    }
   
    $cou++;
   } 
  echo "</table>";
  /*本が一冊も存在しない*/
  if($gaito==0){
   mysql_close($db);
   $_SESSION['param']=4;
   header('Location: error_notexist.php');
   exit();
   }
  $_SESSION['shoseki_id']=$_POST['shoseki_id'];
  $_SESSION['title']=$_POST['title'];
  mysql_close($db);
?>    
  <?php
  echo "借りますか？";
  ?>
  <!--
  switch($_POST['modo']){
     case 1: echo "<p>借りますか？</p>";
     case 2: echo "<p>返しますか？</p>";
     default: break;
  }
  --> 
		</div>
	</div>
 </body>
</html>

