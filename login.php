<?php
session_start();
    /*if(empty($_SESSION['login'])){
        header('Location: logout.php');
    }*/

    if($_SESSION['login'] == "ログイン中！"){
        //ログアウト
        $_SESSION['userId'] = NULL;
        $_SESSION['userName'] = NULL;
        $_SESSION['userPass'] = NULL;
        $_SESSION['login'] = "ログインしていません．";
    }

    if(empty($_POST['username'])){
        require "header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert alert-danger' role='alert'>ログインに失敗しました．<br />UserNameを入力して下さい．<br /><a href='index.php'>戻る</a></p>";
        echo "<section>";
        require "footer.php"; //フッター読み込み
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
        $_SESSION['userId'] = $id;
        $_SESSION['userName'] = $name;
        $_SESSION['userPass'] = $pass;
        
        $_SESSION['login'] = "ログイン中！";
        header('Location: top.php');
    }
    else{
        require "header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert alert-danger' role='alert'>ログインに失敗しました．<br />UserNameとパスワードを確認して下さい．<br /><a href='index.php'>戻る</a></p>";
        
        echo "<section>";
        require "footer.php"; //フッター読み込み
    }
    }
