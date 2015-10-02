<?php
require "spheader.php";

if($_SESSION['mf_login'] == "ログイン中！" || empty($_SESSION['mf_login'])){
    //ログアウト
    $_SESSION['mf_userId'] = NULL;
    $_SESSION['mf_userName'] = NULL;
    $_SESSION['mf_userPass'] = NULL;
    $_SESSION['mf_login'] = "ログインしていません．";
}

if((!empty($_POST['username']))&&(!empty($_POST['pass']))){
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $st = $pdo->query("SELECT * FROM mf_user WHERE name = '{$_POST['username']}'");//ユーザーネームの重複を確認
    
    $duplicate = "clear";
    while ($row = $st->fetch()) {
        $duplicate = "duplicate";
        require "header.php";//ヘッダー読み込み
        echo "<section id='passage'>";
        echo "<div class='alert alert-danger' role='alert'>このユーザーネームはすでに使われています．<br />別の名前で作成してください．<br /><a href='index.php'>戻る</a></div>";
        echo "</section>";
        require "footer.php"; //フッター読み込み
    }
    
    if($duplicate != "duplicate"){
        $st = $pdo->query("SELECT * FROM mf_user WHERE id = (SELECT MAX(id) FROM mf_user)");//最大idの検索
        
        while ($row = $st->fetch()) {
            $id =  htmlspecialchars($row['id']) + 1;
        }
        
        $st = $pdo->query("INSERT INTO mf_user(id, name, pass) VALUES($id,'{$_POST['username']}','{$_POST['pass']}')");//新規ユーザー情報の追加
        
        
        
        $_SESSION['mf_userId'] = $id;
        $_SESSION['mf_userName'] = $_POST['username'];
        $_SESSION['mf_userPass'] = $_POST['pass'];
        $_SESSION['mf_login'] = "ログイン中！";
        
        header('Location: top.php');
        
        
    }
    
    
    
}
else{
    require "header.php";//ヘッダー読み込み
    echo "<section id='passage'>";
    echo "<p class='alert alert-danger' role='alert'>選択が足りません．<br /><a href='index.php'>戻る</a></p>";
    echo "</section>";
    require "footer.php"; //フッター読み込み
}