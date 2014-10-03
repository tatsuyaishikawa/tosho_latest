 <html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  </head>
  <body>
  <?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }

  /* register the rest of data to complete kashidashi table */
   echo 'ログアウトしました';
 $bd=mysql_connect("127.0.0.1","root","agreable2");
 mysql_select_db('tosho',$bd);

 /* get current users id */
 $id=$_SESSION['id'];
 /* delete matchiing session table */
 $requ="delete  from sessio where id='$id'";
 mysql_query($requ);
 /*
 $requ="update kashidashi (rentalid,bookid,id,title,kari_date,kae_date) set kari_date='$rentaldate',kae_date='$limitdate' where id='$id' ";
 $resu=mysql_query($requ);
 */
 mysql_close($bd);
 session_destroy();
  ?>
   <form>
    <a href="login.php"><input type="button" value="ログイン画面に戻る" /></a>
   </form>
  </body>
 </html>
