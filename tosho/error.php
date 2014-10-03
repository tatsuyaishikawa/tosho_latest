 <html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  </head>
  <body>
   <form>
    <?php

 session_start();

 if($_SESSION['id']==1){
  $modoru="main_admin.php";
 }  else{
  $modoru="main.php";
 }

  switch($param){
	case 1:
		echo "ユーザＩＤまたはパスワードが正しくありません。</br>";
    		echo "<a href=\"login.php\"><input type=\"button\" value=\"戻る\" /></a><br/>";
		break;
	case 2:	
		echo "指定されたユーザは存在しません。</br>";
    		echo "<a href=\"sakujo_user.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	case 3:	
		echo "指定された書籍は存在しません。</br>";
    		echo "<a href=\"sakujo_book.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	case 4:
		echo "登録できません。重複するデータが既に存在します。</br>";
    		echo "<a href=\"shinki_book.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	case 5:
		echo "削除できません。対象のユーザはログイン中です。</br>";
    		echo "<a href=\"sakujo_user.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	case 6:
		echo "対象の書籍は貸出中です。削除できません。";
    		echo "<a href=\"sakujo_book.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	case 7:
		echo "登録できません。重複するデータが既に存在します。</br>";
    		echo "<a href=\"shinki_user.php\"><input type=\"button\" value=\"戻る\" /></a>";
		break;
	default: break;
  }
    ?>
   </form>
  </body>
 </html>
