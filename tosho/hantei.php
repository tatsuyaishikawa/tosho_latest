<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body>
<?php

   $id=$_POST['ident'];
   $pass=$_POST['pass'];
 
   $bd=mysql_connect("127.0.0.1","root","agreable");
   mysql_select_db('tosho',$bd);

   $requ='select * from yuza';

   
   $resu=mysql_query($requ) or die();

   while($row=mysql_fetch_array($resu)){
        /*if($row[0]==$_POST['ident'] && $row[1]==$_POST['pass'])*/

        if($row[0]== $id && $row[1]==$pass){
 	/* generate rentalid */
	session_start();
	$_SESSION['id']=$id;
	/*echo "<p>".$row[0]." ".$row[1]."</p>";*/
        /* allow to login to page */
	/* database  pre register processu */
 	mysql_close($bd);
	header('Location: main.php');
	}
   }
   /* login procedure */ /* rediriger vers une autre page erreur error.php*/
   /*$ji=$row[0]; 
   echo $ji;*/
   mysql_close($bd);
   $param=1;
   include("error.php");
  ?>
 </body>
</html>
