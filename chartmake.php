<?php
//require "spheader.php";
//require "header.php";//ヘッダー読み込み
$today = date("Y-m-d");

$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

//瞑想前
$st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'bf' and datetime between '$today 00:00:00' - INTERVAL 1 WEEK and '$today 23:59:59'");

while ($row = $st->fetch()) {
    
    //ラベル
    $rep = htmlspecialchars($row['rep']);
    $datetime = htmlspecialchars($row['datetime']);

    $date = new DateTime($datetime);
    $val1 = $date->format('n/j');
    //感情
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $anxiety = htmlspecialchars($row['anxiety']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);


    $label_data[] = "$val1 $rep 回目";

    $bf_ang_data[] = $ang;
    $bf_sad_data[] = $sad;
    $bf_anxiety_data[] = $anxiety;
    $bf_joy_data[] = $joy;
    $bf_stress_data[] = $stress;
    
}

$jsonLabel=json_encode($label_data);

$json_bf_ang=json_encode($bf_ang_data);

/*
print_r($label_data);
print("<br />");
print("<br />");
print_r($bf_ang_data);
print("<br />");
print_r($bf_sad_data);
print("<br />");
print_r($bf_anxiety_data);
print("<br />");
print_r($bf_joy_data);
print("<br />");
print_r($bf_stress_data);
*/

//瞑想後
$st1 = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'af' and datetime between '$today 00:00:00' - INTERVAL 1 WEEK and '$today 23:59:59'");

while ($row = $st1->fetch()) {
    
    //感情
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $anxiety = htmlspecialchars($row['anxiety']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);


    $af_ang_data[] = $ang;
    $af_sad_data[] = $sad;
    $af_anxiety_data[] = $anxiety;
    $af_joy_data[] = $joy;
    $af_stress_data[] = $stress;
    
}

$json_af_ang=json_encode($af_ang_data);


/*
print("<br />");
print_r($af_ang_data);
print("<br />");
print_r($af_sad_data);
print("<br />");
print_r($af_anxiety_data);
print("<br />");
print_r($af_joy_data);
print("<br />");
print_r($af_stress_data);
*/
