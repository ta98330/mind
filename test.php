<?php
session_start();

    $today = date("Y-m-d");
    $nowtime = date("H:i:s");

    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

    $st = $pdo->query("INSERT INTO mf_evaluation (id, date, time, evaluation) VALUES({$_POST['id']},$today,$nowtime,{$_POST['evaluation']})");
        
    
    header('Location: mob/index.php');
    
    
    
