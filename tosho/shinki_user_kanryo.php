<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 </head>
 <body>
<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }	

  if($_SESSION['id']==1){
  $modoru="main_admin.php";
 } else{
  $modoru="main.php";
 }
	$count=0;
        $ide=$_POST['shinki_ident'];
        $pass=$_POST['shinki_pass'];
   $bd=mysql_connect("127.0.0.1","root","agreable");
   mysql_select_db('tosho',$bd);
	/* 重複データの有無の確認*/
   $requ='select * from yuza';
   $resu=mysql_query($requ);

   while($row=mysql_fetch_array($resu)){
        if($row[0] == $ide || $row[1] == $pass){
	 $count++;
	}
   }

   if($count==0){
    $requ="insert into yuza (user_id,pass,admi) values('$ide','$pass','')";
    mysql_query($requ);
    mysql_close($bd);
    echo "新規ユーザの登録が完了しました。</br>";
    echo "<a href=\"$modoru\"><input type=\"button\" value=\"戻る\" /></a>";
    exit();
   } 
    mysql_close($bd);
    $param=7;
    include("error.php");
  ?>
 </body>
</html>
