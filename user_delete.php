<?php
require "spheader.php";
//未ログイン処理
if(!isset($_SESSION["mf_ad_login"])){
    header('Location: mf_adlogin.php');
}

if(isset($_POST['del_user'])){
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $user_st = $pdo->query("DELETE FROM mf_user WHERE id = {$_POST['del_user']}");
    
    $user_st = $pdo->query("DELETE FROM mf_events WHERE id = {$_POST['del_user']}");
    
    $user_st = $pdo->query("DELETE FROM mf_impressions WHERE id = {$_POST['del_user']}");
    
}

header('Location: admin.php');