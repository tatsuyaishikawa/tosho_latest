<!DOCTYPE>
<html>
 <head>
 <title>図書管理システム</title>
 <link rel="stylesheet" href="./style4.css" type="text/css" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
 <script type="text/javascript" src="./kadai1.js"></script>
 </head>
 
 <body id="back">
   検索結果一覧
	<div id="container1">
  <form>
   <a href="main_admin.php"><input type="button" value="戻る" /></a>
   <a href="logout.php"><input type="button" value="ログアウト" /></a>
  </form>
		<div id="container2">
<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }

 $id=$_SESSION['id'];
 $db=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$db);


 $requ='select * from yuza';
 $res=mysql_query($requ);

 $cou=0;
 
 while($row=mysql_fetch_array($res)){
   if($cou==0){
    echo "全てのユーザ";
    echo "<table border=\"10\" color=\"black\">";
    echo "<tr><td>ユーザID</td><td>パスワード</td><td>権限</td></tr>";
   }

    echo "<tr>
     <td>".$row[0]."</td>
     <td>".$row[1]."</td>
     <td>".$row[2]."</td>
     </tr>";
   
    $cou++;
   } 
   echo "</table>";
  /* end */

  mysql_close($db);
?>    
		</div>
	</div>

  <!--
  switch($_POST['modo']){
     case 1: echo "<p>借りますか？</p>";
     case 2: echo "<p>返しますか？</p>";
     default: break;
  }
  --> 
   <!-- 
    switch($_POST['modo']){
     case 1: echo "借りる";
     case 2: echo "返す";
     default: break;
   } --> 
 </body>
</html>
