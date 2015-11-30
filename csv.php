<?php
    require "spheader.php";
    
    $today = date("Y-m-d");
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    /*1週間
    $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and datetime between '$today 00:00:00' - INTERVAL 1 WEEK and '$today 23:59:59'");
    */




    /*テスト用
    $_POST['id'] = 1;
    $_POST['str_day'] = '2015-10-01';
    $_POST['end_day'] = $today;
    */


    //指定
    $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_POST['id']}' and datetime between '{$_POST['str_day']} 00:00:00' and '{$_POST['end_day']} 23:59:59'");
    

    //日付分け変数定義
    $identification = 0;
    $last_date = $_POST['str_day'];
    
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
        
        //print_r($testarray[]);
        //print("<br />");
        //print("<br />");
        
        //echo "そのデータ", $ident_date, " ", "前のデータ",$last_date, " ", $identification, "<br>";

        
        
        
        
        
    }

if(!isset($assoc_data)){
    $assoc_data[] = array('回数' => "期間中に記録なし");
}
    
/*
    $testarray = array(
        array('rep' => $rep,'datetime' => $datetime,'bfaf' => $bfaf,'ang' => $ang,'sad' => $sad,'anxiety' => $anxiety,'joy' => $joy,'stress' => $stress),
    );
*/



//print_r($assoc_data);



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


