<?php
    session_start();//セッションを使う宣言

    $_SESSION['mf_userId'] = NULL;
    $_SESSION['mf_userName'] = NULL;
    $_SESSION['mf_userPass'] = NULL;
    $_SESSION['mf_login'] = "ログインしていません．";

    header('Location: index.php');
?>
    