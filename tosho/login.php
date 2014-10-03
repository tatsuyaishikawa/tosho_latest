<!DOCTYPE>
<html>
 <head>
 <title>活動確認サービス</title>
 <meta charset="UTF-8">
 <meta http-equiv="Content-Type" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 <link rel="stylesheet" href="./style1.css" type="text/stylesheet" /> 
 <script type="text/javascript" src="javasc.js">
 </script>
 </head>
 <body id="back">
  図書管理システム
   ログイン
	<div id="container1">
	 <div id="container2">
    <form action="hantei.php" method="POST">
     ユーザID<input type="text" name="ident" /><br/>
     パスワード<input type="password" name="pass" /><br/>
     <div id="err"></div>
     <input type="submit" value="ログイン"/>
     <input type="reset" value="消去" /><br/>
     <a href="login_admin.php">管理者としてログイン</a>
    </form>
	 </div>
	</div>
 </body>
</html>
