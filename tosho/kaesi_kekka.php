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
 
 <body id="back" onload="desactive_kaesi()">
   検索結果一覧
	<div id="container1">
  <form action="kaesi_kanryo.php"  method="POST">
   <input type="submit" value="返す" id="valide" />
   <input type="reset" value="取り消し" />
   <a href="kaesi_search.php"><input type="button" value="戻る" /></a>
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
 $shoseki_id=$_POST['shoseki_id'];
 $id=$_SESSION['id'];

 $db=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$db);

 /*①本がkashidashiテーブルに存在するかを確認*/
 /* kashidashi テーブルではなく、ログインユーザが借りている本の一覧を見るのです*/
 $requ="select * from kashidashi where id='$id'";
 $apre=mysql_query($requ);

 /*もしデータがなければハンドルする*/
 if($apre==false){
  echo "貸出テーブルにそのＩＤの書籍は存在しません";
  include 'error.php';
  exit();
 }

 while($row=mysql_fetch_array($apre)){
   if($cou==0){
    echo "<form><table border=\"10\" color=\"black\">";
    echo "<tr><td>書籍ID</td><td>書籍名</td><td>分類</td><td>著者名</td><td>貸出状況</td></tr>";
   }

   /* bookidが一致する、つまり借りている本である*/
   if($row[1]==$shoseki_id){
  
    /*　街頭するbookidのデータをbooksテーブルから検索する*/ 
    $requ1="select * from books where book_id='$shoseki_id'"; 
    $resu1=mysql_query($requ1);
    $row1=mysql_fetch_array($resu1);
 
    /*表示*/
    echo "<tr>
     <td>".$row1[0]."</td>
     <td>".$row1[1]."</td>
     <td>".$row1[2]."</td>
     <td>".$row1[3]."</td>
     <td id=\"statu\">".$row1[4]."</td>
     </tr>";
    
    $gaito++;
    }
   
    $cou++;
   } 
  /*本が一冊も存在しない*/
  if($gaito==0){
   mysql_close($db);
   $_SESSION['param']=5;
   header('Location: error_notexist.php');
   exit();
   }
   echo "</table>";
  $_SESSION['shoseki_id']=$_POST['shoseki_id'];
  mysql_close($db);
?>    
  <?php
  echo "返しますか？";
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
