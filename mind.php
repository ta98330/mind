<?php
    echo "{$_SESSION['mf_userName']}さん,";
    $nowtime = date("G");
    $nowweek = date("w");

    if($nowtime >= 6 && $nowtime <= 10)
        echo "おはようございます．";
    elseif($nowtime >= 11 && $nowtime <= 16)
        echo "こんにちは．";
    else
        echo "こんばんは．";

    switch ($nowweek){
        case '0';
            $weekja = "日";
            break;
        case '1';
            $weekja = "月";
            break;
        case '2';
            $weekja = "火";
            break;
        case '3';
            $weekja = "水";
            break;
        case '4';
            $weekja = "木";
            break;
        case '5';
            $weekja = "金";
            break;
        case '6';
            $weekja = "土";
            break;
    }

    echo "<br />今日は",date('n月 j日'),$weekja,"曜日です．";
