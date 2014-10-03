<!DOCTYPE>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 </head>
 <body>
<?php
 session_start();
if(!isset($_SESSION['id'])){
  header("Location: login.php");
 }

   $bookid=$_POST['book_id'];
   $name=$_POST['title'];
   $category=$_POST['category'];
   $categori=$_POST['author']; 

   $bd=mysql_connect("127.0.0.1","root","agreable");
   mysql_select_db('tosho',$bd);

   /*本が存在するか検索*/
   $requ='select *  from books';
   $resu=mysql_query($requ);

   while($row=mysql_fetch_array($resu)){
        if($row[0]==$bookid){
	 /*貸出中であればエラーメッセージを出力する*/
         $requ="select * from kashidashi";
	 $resu=mysql_query($requ);
	 while($row=mysql_fetch_array($resu)){
	  if($row[1]==$bookid){
	   mysql_close($bd);
	   $param=6;
	   include("error.php");
	   exit();
	  }
	 }
	 /*削除*/
	 $requ="delete from books where book_id='$bookid'";
	 mysql_query($requ);
	 mysql_close($bd);
 	 echo "削除しました";
	}
   }

   $param=3;
   include('error.php');
   exit();
  ?>
 <form>
  <a href="sakujo_book.php"><input type="button" value="削除する書籍の登録に戻る"/></a>
  <a href="main_admin.php"><input type="button" value="メインメニューに戻る"/></a>
 </form>
 </body>
</html>
