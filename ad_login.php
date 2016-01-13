<?php
require "spheader.php";

if(empty($_POST['administrator'])){
    require "admin_header.php";//ヘッダー読み込み
    echo "<section id='passage' class='container'>";
    echo "<p class='alert'>ログインに失敗しました．<br />UserNameを入力して下さい．<br /><a href='mf_adlogin.php'>戻る</a></p>";
    echo "</section>";
    echo "</body>";
    echo "</html>";
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

        header('Location: admin.php');
    }
    else{
        session_destroy();//セッション破棄
        require "admin_header.php";//ヘッダー読み込み
        echo "<section id='passage' class='container'>";
        echo "<p class='alert'>ログインに失敗しました．<br />UserNameとパスワードを確認して下さい．<br /><a href='mf_adlogin.php'>戻る</a></p>";
        echo "</section>";
        echo "</body>";
        echo "</html>";
    }
}
