<?php
require "spheader.php";

if(!empty($_POST['username'])){
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $st = $pdo->query("SELECT * FROM mf_user WHERE name = '{$_POST['username']}'");//ユーザーネームの重複を確認
    
    $duplicate = "clear";
    while ($row = $st->fetch()) {
        $duplicate = "duplicate";
        require "admin_header.php";//ヘッダー読み込み
        echo "<section id='passage'>";
        echo "<div class='alert'>このユーザーネームはすでに使われています．<br />別の名前で作成してください．<br /><a href='admin.php'>戻る</a></div>";
        echo "</section>";
        echo "</body>";
        echo "</html>";
    }
    
    if($duplicate != "duplicate"){
        $st = $pdo->query("SELECT * FROM mf_user WHERE id = (SELECT MAX(id) FROM mf_user)");//最大idの検索
        
        while ($row = $st->fetch()) {
            $id =  htmlspecialchars($row['id']) + 1;
        }
        
        $st = $pdo->query("INSERT INTO mf_user(id, name, pass) VALUES($id,'{$_POST['username']}','password')");//新規ユーザー情報の追加
        
        header('Location: admin.php');
    }
}
else{
    require "admin_header.php";//ヘッダー読み込み
    echo "<section id='passage'>";
    echo "<p class='alert alert-danger' role='alert'>選択が足りません．<br /><a href='admin.php'>戻る</a></p>";
    echo "</section>";
    echo "</body>";
    echo "</html>";
}