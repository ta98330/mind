<?php require "spheader.php"; ?>
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
            <h2>CSV出力</h2>
            <form method="post" action="csv.php">
                <labe>被験者:
                    <select name="id">
                    <?php
                    
                    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                    
                    $st = $pdo->query("SELECT * FROM mf_user WHERE NOT id = 999");//SQL文の発行
                    while ($row = $st->fetch()) {
                        $id = htmlspecialchars($row['id']);
                        $name = htmlspecialchars($row['name']);
                        echo "<option value='$id'>$name</option>";
                        
                    }
                    ?>
                    </select>
                </labe><br />
                <label>開始日:<input type="date" name="str_day" min="2015-10-01" required></label><br />
                <label>終了日:<input type="date" name="end_day" min="2015-10-01" required></label><br />
                <button type="submit">ダウンロード</button>
            </form>
        </section>
        
        
        
        <section>
            <h2>新規ユーザー登録</h2>
            <form method="post" action="signin.php" id="login-nav">
                <div class="form-group">
                     <label class="sr-only" for="exampleinputformat">ユーザーネーム:</label>
                     <input type="text" class="form-control" name="username" placeholder="User Name" required>
                </div>
                <div class="form-group">
                     <label class="sr-only" for="exampleInputPassword2">パスワード:</label>
                     <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-block">登録</button>
                </div>
            </form>
        </section>
    
    
    </body>
</html>