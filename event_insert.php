<?php
session_start();
$now = date("Y-m-d H:i:s");
$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");


if(!empty($_POST['eventContent'])){
    $st = $pdo->query("INSERT INTO mf_events VALUES({$_SESSION['userId']},'$now','{$_POST['eventContent']}')");
    
    
}





header('Location: event.php');
?>