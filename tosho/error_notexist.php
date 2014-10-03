<html>
 <head>
  <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" />
 </head>
 <body>
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

 switch($_SESSION['param']){

	case 4:
                echo "IDまたはtitleが正しくありません。</br>";
                echo "<a href=\"kari_search.php\"><input type=\"button\" value=\"戻る\" /></a>";
                break;
        case 5:
                /*shinki_book*/
                echo "あなたは指定された本を借りてません。</br>";
                echo "<a href=\"kaesi_search.php\"><input type=\"button\" value=\"戻
る\" /></a>";
                break;
	default:
		break;
	}
?>
 </body>
</html> 
