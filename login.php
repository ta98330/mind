<?php
session_start();

if(empty($_POST['username'])){
    require "header.php";//ヘッダー読み込み
    $reposi = "index.php";//戻り先
    $mestitle = "ログインに失敗しました";//エラータイトル
    $mescontent = "UserNameを入力して下さい．";//エラーメッセージ
    require "warning.php"; //エラーページ読み込み
}
else{
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

    $st = $pdo->query("SELECT * FROM mf_user WHERE name = '{$_POST['username']}' AND pass = '{$_POST['pass']}'");

    while ($row = $st->fetch()) {
        $id = htmlspecialchars($row['id']);
        $name = htmlspecialchars($row['name']);
        $pass = htmlspecialchars($row['pass']);
    }

    if($_POST['username'] == @$name){//while文から結果が得られた->idとpassが一致
        $_SESSION['mf_userId'] = $id;
        $_SESSION['mf_userName'] = $name;
        $_SESSION['mf_userPass'] = $pass;

        if(isset($_POST["memory"]) && $_POST["memory"]==="true"){//次回からは自動的にログイン
            $timestamp = time();
            $today = date("Y-m-d");

            $_SESSION["TEST"] = md5("{$_SESSION['mf_userPass']}"+"$timestamp");//セッションに保存

            $flag = setcookie("mf_COOKIE", $_SESSION["TEST"], time()+3600*24*14);//クッキーに保存

            if($flag){
                $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

                $st = $pdo->query("INSERT INTO mf_auto_login VALUES ( '{$_SESSION["TEST"]}','$id','$name','$pass','$today')");
            }
        }

        $_SESSION['mf_login'] = "ログイン中！";
        header('Location: top.php');
    }
    else{
        session_destroy();//セッション破棄
        require "header.php";//ヘッダー読み込み
        $reposi = "index.php";
        $mestitle = "ログインに失敗しました";
        $mescontent = "UserNameとパスワードを確認して下さい．";
        require "warning.php"; //エラーページ読み込み
    }
}
