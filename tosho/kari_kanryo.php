<?php
 session_start();

 if(!isset($_SESSION['id'])){
  header("login.php");
 }

 if($_SESSION['id']==1){
  $modoru="main_admin.php";
 } else{
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

 $bd=mysql_connect("127.0.0.1","root","agreable");
 mysql_select_db('tosho',$bd);
 
 /* kashidashiテーブルに格納するデータを６つ用意*/
 $shoseki_id=$_SESSION['shoseki_id'];
 $title=$_SESSION['title'];
 $id=$_SESSION['id'];
 
 /*日付の登録 */
 $kari_date=date("m/d/Y G:i:s");
 $kae_date=date("m/d/Y G:i:s");
 /*$kae_date=return_date($kari_date);*/

 /*もし$title'が空であればbookidからtitleを検索して追加する*/
 if(!(isset($title))){
   $requ="select * from books where '$shoseki_id'";
   $resu=mysql_query($requ); 
   
   $row=mysql_fetch_array($resu);
   $title=$_SESSION['title']=$row[1]; 
   }
 /* get id to find matching kashidashi table*/
 $requ="insert into kashidashi (rental_id,shoseki_id,title,id,kari_date,kae_date) values('','$shoseki_id','$title','$id','$kari_date','$kae_date')";

 $resu=mysql_query($requ);
 
 
 /*貸出中でなければ登録する*/
 $requ="update books set status='貸' where book_id='$shoseki_id'";
 mysql_query($requ);
 mysql_free_result($resu);
 mysql_close($bd);
 echo "本を借りました。";
  ?>
   <form>
    <a href="kari_search.php"><input type="button" value="検索メニューに戻る" /></a>
    <a href="<?php echo $modoru; ?>"><input type="button" value="メインメニューに戻る" /></a>
   </form>
  </body>
 </html>
