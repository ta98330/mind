<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0">
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="pcbase.css">
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
		<title>研究用管理ページ</title>
		
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script src="move.js"></script>
        
	</head>
    
    <body>
        <!-- ヘッダ　-->
        <header>
            <h1><a href="admin.php">Mindfulness研究管理ページ</a></h1>
            
            
            <!-- メニュー-->
            <nav id="headerNav">
                <ul>
                    <li><a href="#update"><i class="fa fa-bell"></i> 更新情報</a></li>
                    <li><a href="index.php">Mindfulnessアプリ</a></li>
                </ul>
            </nav>
            
        </header>
        
        
        
        
        
        
        <section>
            <h2>新規ユーザー登録</h2>
            <form method="post" action="signin.php" id="login-nav">
                <div class="form-group">
                     <label class="sr-only" for="exampleinputformat">ユーザーネーム</label>
                     <input type="text" class="form-control" name="username" placeholder="User Name" required>
                </div>
                <div class="form-group">
                     <label class="sr-only" for="exampleInputPassword2">パスワード</label>
                     <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-block">登録</button>
                </div>
            </form>
        </section>
    
    
    </body>
</html>