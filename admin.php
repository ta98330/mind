<?php
    require "spheader.php";

    //未ログイン処理
    if(!isset($_SESSION["mf_ad_login"])){
        header('Location: index.php');
    }
?>
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
        
        <script type="text/javascript">
        //https://w3g.jp/blog/js_browser_sniffing2015
        //スマホの判定に使用
        
        var _ua = (function(u){
            return {
                Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1)
                  || u.indexOf("ipad") != -1
                  || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
                  || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
                  || u.indexOf("kindle") != -1
                  || u.indexOf("silk") != -1
                  || u.indexOf("playbook") != -1,
                Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
                  || u.indexOf("iphone") != -1
                  || u.indexOf("ipod") != -1
                  || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
                  || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
                  || u.indexOf("blackberry") != -1
                }
            })(window.navigator.userAgent.toLowerCase());
            
            
            if(_ua.Mobile){
                //この中のコードはスマホにのみ適用
                //alert("このページはPC専用です．\nログインページに移動します．")
                //location.href = "index.php";
            }else if(_ua.Tablet){
                //この中のコードはタブレットにのみ適用
                //location.href = "index.php";
            }else{
                //この中のコードはスマホとタブレット以外に適用
                /*
                if(window.confirm('PC用のページに移動しますか？')){
                    location.href = "index.html";
                }
                alert("このページはPC専用です．\nログインページに移動します．")
                location.href = "index.php";
                */
            }
        
        </script>
        
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
                <labe>ユーザー:
                    <select name="id">
                    <?php
                    
                    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                    
                    $number = 0;
                        
                    $st = $pdo->query("SELECT * FROM mf_user WHERE NOT id = 999");//SQL文の発行
                    while ($row = $st->fetch()) {
                        $id = htmlspecialchars($row['id']);
                        $name = htmlspecialchars($row['name']);
                        echo "<option value='$id'>$name</option>";
                        $number++;
                    }
                    ?>
                    </select>
                </labe><br />
                <label>開始日:<input type="date" name="str_day" min="2015-10-01" required></label><br />
                <label>終了日:<input type="date" name="end_day" min="2015-10-01" required></label><br />
                <button type="submit">ダウンロード</button>
            </form>
        </section>
        
        <section id="info">
            <h2>インフォメーション</h2>
            <p>現在の登録ユーザー数は<?= $number ?>人です．</p>
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
        
        <a href="logout.php"><i class="fa fa-sign-out"></i>ログアウト</a>
    </body>
</html>