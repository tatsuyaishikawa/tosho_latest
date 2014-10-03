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
   $title=$_POST['title'];
   $category=$_POST['category']; 
   $author=$_POST['author']; 

   $bd=mysql_connect("127.0.0.1","root","agreable");
   mysql_select_db('tosho',$bd);

   /* 本のＩＤが重複していないか確認する。していれば貸出拒否の処理と同様にする(kari_kanryo.php*/
   $requ='select *  from books';
   $resu=mysql_query($requ);

   while($row=mysql_fetch_array($resu)){
        if($row[0]==$bookid || $row[1]==$title){
	 mysql_close($bd);
	 $param=4;
	 include('error.php');
	 exit();
	}
   }
	/* database  pre register processu */
	$requ="insert into books (book_id,title,category,author,status) values('$bookid','$title','$category','$author','')";
	mysql_query($requ);
 	mysql_close($bd);
	/*header('Location: main.php');*/
	
   /* login procedure */ /* rediriger vers une autre page erreur error.php*/
   /*$ji=$row[0]; 
   echo $ji;*/
   echo "新規書籍の追加が完了しました。";
  ?>
 <form>
  <a href="shinki_book.php"><input type="button" value="追加する書籍の登録に戻る"/></a>
  <a href="main_admin.php"><input type="button" value="メインメニューに戻る"/></a>
 </form>
 </body>
</html>
