<?php
session_start();


    if(empty($_POST['administrator'])){
        require "admin_header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert'>ログインに失敗しました．<br />UserNameを入力して下さい．<br /><a href='mf_adlogin.php'>戻る</a></p>";
        echo "<section>";
        require "footer.php"; //フッター読み込み
    }
    else{


    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $st = $pdo->query("SELECT * FROM mf_user WHERE id = 1");
        
    //idが1（管理者）のデータ読込
    while ($row = $st->fetch()) {
        $id = htmlspecialchars($row['id']);
        $name = htmlspecialchars($row['name']);
        $pass = htmlspecialchars($row['pass']);
        
    }
        
        
    
        
    
    
    
        

    if($_POST['administrator'] == $name && $_POST['admin_pass'] == $pass){
        $_SESSION['mf_ad_login'] = 'true';
        
        
        
        /*
        if(isset($_POST["memory"]) && $_POST["memory"]==="true"){//次回からは自動的にログイン
            $timestamp = time();
            $today = date("Y-m-d");
            
            $_SESSION["TEST"] = md5("{$_SESSION['mf_userPass']}"+"$timestamp");//セッションに保存
            
            $flag = setcookie("mf_COOKIE", $_SESSION["TEST"], time()+3600*24*14);//クッキーに保存
            
            if($flag){
                $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                
                $st = $pdo->query("INSERT INTO mf_auto_login VALUES ( '{$_SESSION["TEST"]}','$id','$name','$pass','$today')");
            }
            else{
                //クッキー失敗
            }
        }
        */
        
        
        
        header('Location: admin.php');
    }
    else{
        session_destroy();//セッション破棄
        require "admin_header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert'>ログインに失敗しました．<br />UserNameとパスワードを確認して下さい．<br /><a href='mf_adlogin.php'>戻る</a></p>";
        
        echo "<section>";
        require "footer.php"; //フッター読み込み
    }
    }
