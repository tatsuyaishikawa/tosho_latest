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
 <title>図書管理システム</title>
 <link rel="stylesheet" href="./style4.css" type="text/css"  />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
 <script type="text/javascript" src="./kadai1.js"></script>
 </head>

 <body id="back">
   検索結果一覧
	<div id="container1">
  <form>
   <a href="<?php echo $modoru; ?>"><input type="button" value="戻る" /></a>
   <a href="logout.php"><input type="button" value="ログアウト" /></a>
  </form>
		<div id="container2">
<?php
 $id=$_SESSION['id'];
 $db=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$db);

 /*  全ての本の貸し出し状況を表示 start*/
 $requ='select * from books';
 $apre=mysql_query($requ);

 $cou=0;
 
 while($row=mysql_fetch_array($apre)){
   if($cou==0){
    echo "全ての本";
    echo "<table border=\"10\" color=\"black\">";
    echo "<tr><td>書籍ID</td><td>書籍名</td><td>分類</td><td>著者名</td><td>貸出状況</td></tr>";
   }

    echo "<tr>
     <td>".$row[0]."</td>
     <td>".$row[1]."</td>
     <td>".$row[2]."</td>
     <td>".$row[3]."</td>
     <td>".$row[4]."</td>
     </tr>";
   
    $cou++;
   } 
   echo "</table>";
  /* end */


 /*ログインユーザの貸出本のみ表示 start*/
 $requ="select * from kashidashi where id='$id'";
 $resu=mysql_query($requ);

 $cou=0;
 while($row=mysql_fetch_array($resu)){
  if($cou==0){
   echo "ログインユーザの貸出状況";
   echo "<table border=\"10\" color=\"black\">";
   echo "<tr><td>貸し出しID</td><td>書籍ID</td><td>書籍名</td><td>貸出日</td><td>返却日</td></tr>";
   }
 
  if($row[3]==$id){
    echo "<tr>
     <td>".$row[0]."</td>
     <td>".$row[1]."</td>
     <td>".$row[2]."</td>
     <td>".$row[4]."</td>
     <td>".$row[5]."</td>
"; 
   }
  
   $cou++;
 }
 echo "</table>";
 /*end */
 
  mysql_close($db);
?>    
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
		</div>
	</div>
 </body>
</html>
