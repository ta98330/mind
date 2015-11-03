<?php
    require "spheader.php";
    
    $today = date("Y-m-d");
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    /*1週間
    $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and datetime between '$today 00:00:00' - INTERVAL 1 WEEK and '$today 23:59:59'");
    */
    
    //指定
    $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_POST['id']}' and datetime between '{$_POST['str_day']} 00:00:00' and '{$_POST['end_day']} 23:59:59'");
    
    
    while ($row = $st->fetch()) {
        
        
        $rep = htmlspecialchars($row['rep']);
        
        $datetime = htmlspecialchars($row['datetime']);
        /*
        $date = new DateTime($datetime);
        $val1 = $date->format('Y-m-d');
        */
        $bfaf = htmlspecialchars($row['bfaf']);
        $ang = htmlspecialchars($row['ang']);
        $sad = htmlspecialchars($row['sad']);
        $anxiety = htmlspecialchars($row['anxiety']);
        $joy = htmlspecialchars($row['joy']);
        $stress = htmlspecialchars($row['stress']);
        
        
        $assoc_data[] = array('回数' => $rep,'日時' => $datetime,'前後' => $bfaf,'怒り' => $ang,'悲しみ' => $sad,'不安' => $anxiety,'喜び' => $joy,'ストレス' => $stress);
        
        //print_r($testarray[]);
        //print("<br />");
        //print("<br />");
        
        
        
    }

if(!isset($assoc_data)){
    $assoc_data[] = array('回数' => "期間中に記録なし");
}
    
/*
    $testarray = array(
        array('rep' => $rep,'datetime' => $datetime,'bfaf' => $bfaf,'ang' => $ang,'sad' => $sad,'anxiety' => $anxiety,'joy' => $joy,'stress' => $stress),
    );
    
*/

$st1 = $pdo->query("SELECT name FROM mf_user WHERE id = {$_POST['id']}");
while ($row = $st1->fetch()) {
    $name = htmlspecialchars($row['name']);
}

$file_name = "$name {$_POST['str_day']}～{$_POST['end_day']}";

//print($file_name);
//print_r($testarray);

//http://qiita.com/masarufuruya/items/e5e348ae325740c49795

//キーヘッダー
$csv_header = array(
        '回数',
        '日時',
        '前後',
        '怒り',
        '悲しみ',
        '不安',
        '喜び',
        'ストレス'
   );

//出力ヘッダー
$enco_header = array(
        '回数',
        '日時',
        '前後',
        '怒り',
        '悲しみ',
        '不安',
        '喜び',
        'ストレス'
   );

mb_convert_variables('SJIS', 'UTF-8', $enco_header);

    
    

    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=$file_name.csv");

    $stream = fopen('php://output', 'w');
    fputcsv($stream, $enco_header);

    //mb_convert_variables('SJIS', 'UTF-8', $csv_header);
    //mb_convert_variables('SJIS', 'UTF-8', $assoc_data);
    //ヘッダーの文字コードを変えると一致しなくなりデータが取れない

    foreach($assoc_data as $key => $assoc_row){
        $numeric_row = array();
        foreach ($csv_header as $header_name) {
            mb_convert_variables('SJIS', 'UTF-8', $assoc_row[$header_name]);
            $numeric_row[] = $assoc_row[$header_name];
        }
        fputcsv($stream, $numeric_row);
    }


