<?php
    require "spheader.php";
    $today = date("Y-m-d");
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

    //指定
    $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_POST['id']}' and datetime between '{$_POST['str_day']} 00:00:00' and '{$_POST['end_day']} 23:59:59'");
    
    //日付分け変数定義
    $identification = 0;
    $last_date = $_POST['str_day'];
    
    while ($row = $st->fetch()) {
        $rep = htmlspecialchars($row['rep']);
        
        $datetime = htmlspecialchars($row['datetime']);
        $bfaf = htmlspecialchars($row['bfaf']);
        $ang = htmlspecialchars($row['ang']);
        $sad = htmlspecialchars($row['sad']);
        $anxiety = htmlspecialchars($row['anxiety']);
        $joy = htmlspecialchars($row['joy']);
        $stress = htmlspecialchars($row['stress']);
        
        //出来事
        $eventdata = "";
        
        if($bfaf == 'bf'){
            
            $eventdate = date('Y-m-d', strtotime($datetime));
            
            $st1 = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_POST['id']}' and datetime between '$eventdate 00:00:00' and '$eventdate 23:59:59'");
            
            while (@$row = $st1->fetch()) {
                $event_datetime = htmlspecialchars($row['datetime']);
                $content = nl2br(htmlspecialchars($row['content']));
                $eventtime = date('G:i', strtotime($event_datetime));
                $eventdata .= $eventtime.$content." ";
            }
        }
        
        //bfafを0・1に
        if($bfaf == 'bf'){
            $bfaf = '0';
        }
        else{
            $bfaf = '1';
        }
        
        //日付分け
        $str_date =  date('Y-m-d', strtotime($datetime));
        
        if(isset($ident_date)){
            $last_date = $ident_date;
        }
        else{
            $last_date = $str_date;
        }
        
        $ident_date =  date('Y-m-d', strtotime($datetime));
        
        if($ident_date != $last_date){
            $identification++;
        }
        
        $assoc_data[] = array('日付別' => $identification, '回数' => $rep,'日時' => $datetime,'前後' => $bfaf,'怒り' => $ang,'悲しみ' => $sad,'不安' => $anxiety,'喜び' => $joy,'ストレス' => $stress,'出来事' => $eventdata);
        
    }

if(!isset($assoc_data)){
    $assoc_data[] = array('回数' => "期間中に記録なし");
}

$st1 = $pdo->query("SELECT name FROM mf_user WHERE id = {$_POST['id']}");
while ($row = $st1->fetch()) {
    $name = htmlspecialchars($row['name']);
}

$file_name = "$name {$_POST['str_day']}～{$_POST['end_day']}";

//キーヘッダー
$csv_header = array(
        '日付別',
        '回数',
        '日時',
        '前後',
        '怒り',
        '悲しみ',
        '不安',
        '喜び',
        'ストレス',
        '出来事'
   );

//出力ヘッダー
$enco_header = array(
        '日付別',
        '回数',
        '日時',
        '前後',
        '怒り',
        '悲しみ',
        '不安',
        '喜び',
        'ストレス',
        '出来事'
   );

mb_convert_variables('SJIS', 'UTF-8', $enco_header);

    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=$file_name.csv");

    $stream = fopen('php://output', 'w');
    fputcsv($stream, $enco_header);

    foreach($assoc_data as $key => $assoc_row){
        $numeric_row = array();
        foreach ($csv_header as $header_name) {
            mb_convert_variables('SJIS', 'UTF-8', $assoc_row[$header_name]);
            $numeric_row[] = $assoc_row[$header_name];
        }
        fputcsv($stream, $numeric_row);
    }


