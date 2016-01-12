<?php
    require "spheader.php";
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    
    if(!empty($_POST['pass']) && !empty($_POST['newPass'])){
        if($_SESSION['mf_userPass'] == $_POST['pass']){
            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
            $st = $pdo->prepare("UPDATE mf_user SET pass = ? WHERE id = {$_SESSION['mf_userId']}");
            $st->execute(array($_POST['newPass']));

            $_SESSION['mf_userPass'] = $_POST['newPass'];
            header('Location: config.php');
        }
        else{
            require "header.php";//ヘッダー読み込み
            $reposi = "config.php";//戻り先
            $mestitle = "変更できませんでした";//エラータイトル
            $mescontent = "入力された現在のパスワードが間違っています．";//エラーメッセージ
            require "warning.php"; //エラーページ読み込み
        }
    }
    else{
        require "header.php";//ヘッダー読み込み
        $reposi = "config.php";//戻り先
        $mestitle = "変更できませんでした";//エラータイトル
        $mescontent = "パスワードが入力されていません．";//エラーメッセージ
        require "warning.php"; //エラーページ読み込み
    }
