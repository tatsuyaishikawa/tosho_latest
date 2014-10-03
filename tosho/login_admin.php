<!DOCTYPE>
<html>
 <head>
 <title>管理者ログイン画面</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <link rel="stylesheet" href="./style1.css" type="text/stylesheet" /> 
 </head>
 <body id="back">
  図書管理システム
   管理者専用ログイン画面
	<div id="container1">
		<div id="container2">
    <form action="hantei_admin.php" method="POST">
     ユーザID<input type="text" name="ident" /><br/>
     パスワード<input type="password" name="pass" /><br/>
     <input type="submit" value="ログイン" />
     <input type="reset" value="消去" /><br/>
    </form>
		</div>
	</div>
 </body>
</html>
