<?php
 session_start();

 if(!isset($_SESSION['id'])){
  header("login.php");
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
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  </head>
  <body>
  <?php

  /* register the rest of data to complete kashidashi table */
   echo '返却が完了しました';
 $bd=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$bd);
 $kari_date="ji";
 $kae_date="hi";
 $id=$_SESSION['id']; 
 $shoseki_id=$_SESSION['shoseki_id']; 
 /* get id to find matching kashidashi table*/

 $requ="delete from kashidashi where id='$id' and shoseki_id='$shoseki_id'";
 $resu=mysql_query($requ);
 
 
 /* change book state */
 $requ="update books set status='null' where book_id='$shoseki_id'";
 mysql_query($requ);
 mysql_free_result($resu);
 mysql_close($bd);
 echo "本を返しました。";
  ?>
   <form>
    <a href="kaesi_search.php"><input type="button" value="検索メニューに戻る" /></a>
    <a href="<?php echo $modoru; ?>"><input type="button" value="メインメニューに戻る" /></a>
   </form>
  </body>
 </html>
