<?php
session_start();


//データベース側消去
$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                
$st = $pdo->query("DELETE FROM mf_auto_login WHERE passkey = '{$_SESSION["TEST"]}'");

//クッキー消去
setcookie("mf_COOKIE", $_SESSION["TEST"], time() - 1800);

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
 
//セッションを破壊してリダイレクト
session_destroy();
header("Location:index.php");


?>
    