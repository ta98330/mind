<?php
require "spheader.php";

if((!empty($_POST['username']))&&(!empty($_POST['pass']))){
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $st = $pdo->query("SELECT * FROM mf_user WHERE name = '{$_POST['username']}'");//ユーザーネームの重複を確認
    
    $duplicate = "clear";
    while ($row = $st->fetch()) {
        $duplicate = "duplicate";
        require "header.php";//ヘッダー読み込み
        $reposi = "index.php";//戻り先
        $mestitle = "このユーザーネームはすでに使われています";//エラータイトル
        $mescontent = "別の名前で作成してください．";//エラーメッセージ
        require "warning.php"; //エラーページ読み込み
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
    $reposi = "index.php";//戻り先
    $mestitle = "入力項目が足りません";//エラータイトル
    $mescontent = "ユーザーネームとパスワードを確認してください．";//エラーメッセージ
    require "warning.php"; //エラーページ読み込み
}