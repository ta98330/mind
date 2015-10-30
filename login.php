<?php
session_start();


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
        $_SESSION['mf_userId'] = $id;
        $_SESSION['mf_userName'] = $name;
        $_SESSION['mf_userPass'] = $pass;
        
        
        
        if(isset($_POST["memory"]) && $_POST["memory"]==="true"){//次回からは自動的にログイン
            $timestamp = time();
            $_SESSION["TEST"] = md5("{$_SESSION['mf_userPass']}"+"$timestamp");//セッションに保存
            
            $flag = setcookie("mf_COOKIE", $_SESSION["TEST"], time()+3600*24*14);//クッキーに保存
            
            if($flag){
                $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                
                $st = $pdo->query("INSERT INTO mf_auto_login VALUES ( '{$_SESSION["TEST"]}','$id','$name','$pass',$timestamp)");
            }
            else{
                //クッキー失敗
            }
        }
        
        
        
        $_SESSION['mf_login'] = "ログイン中！";
        header('Location: top.php');
    }
    else{
        session_destroy();//セッション破棄
        require "header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert alert-danger' role='alert'>ログインに失敗しました．<br />UserNameとパスワードを確認して下さい．<br /><a href='index.php'>戻る</a></p>";
        
        echo "<section>";
        require "footer.php"; //フッター読み込み
    }
    }
