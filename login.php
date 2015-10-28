<?php
session_start();

    if($_SESSION['mf_login'] == "ログイン中！"){
        //ログアウト
        // セッション変数を全て解除する
        $_SESSION = array();

        // セッションを切断するにはセッションクッキーも削除する。
        // Note: セッション情報だけでなくセッションを破壊する。
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }

    if(empty($_POST['username'])){
        require "header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert alert-danger' role='alert'>ログインに失敗しました．<br />ユーザーネームを入力して下さい．<br /><a href='index.php'>戻る</a></p>";
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

            //クッキーの存在確認
            if(isset($_COOKIE["mf_TEST_COOKIE"]) && $_COOKIE["mf_TEST_COOKIE"] === md5($pass)){

                $_SESSION["mf_TEST"] = $_COOKIE["mf_TEST_COOKIE"];
                
                $_SESSION['mf_login'] = "ログイン中！";
                header('Location: top.php');
            }

            if(isset($_POST["action"])&&$_POST["action"]==="login"){

                $_SESSION["mf_TEST"] = md5($pass);//暗号化してセッションに保存

                if(isset($_POST["memory"]) && $_POST["memory"]==="true"){//次回からは自動的にログイン
                    setcookie("mf_TEST_COOKIE", $_SESSION["mf_TEST"], time()+3600*24*14);//暗号化してクッキーに保存
                }

                $_SESSION['mf_login'] = "ログイン中！";
                header('Location: top.php');
            }
        }
        else{
            require "header.php";//ヘッダー読み込み
            echo "<body>";
            echo "<section id='passage' class='container'>";
            echo "<p class='alert alert-danger' role='alert'>ログインに失敗しました．<br />ユーザーネームとパスワードを確認して下さい．<br /><a href='index.php'>戻る</a></p>";
            echo "<section>";
            require "footer.php"; //フッター読み込み
        }
    }
