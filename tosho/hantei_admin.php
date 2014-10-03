<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body>
<?php

   $id=$_POST['ident'];
   $pass=$_POST['pass'];
   $admin_id=1;
   $admin_pass='a';

        /*if($row[0]==$_POST['ident'] && $row[1]==$_POST['pass'])*/
        
        if($admin_id== $id &&  $admin_pass==$pass){
 	/* generate rentalid */
	 
	session_start();
	$_SESSION['id']=$id;
	/*echo "<p>".$row[0]." ".$row[1]."</p>";*/
        /* allow to login to page */
	/* database  pre register processu */
	header('Location: main_admin.php');
	}
   /* login procedure */ /* rediriger vers une autre page erreur error.php*/
   /*$ji=$row[0]; 
   echo $ji;*/
   
   $param=1;
   unset($param);
   include "error.php";
  ?>
 </body>
</html>
