<?php
    //session_start();//開発時のみ有効にする

//出来事未登録
    $today = date("Y-m-d");
    
    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
    
    $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['mf_userId']}' and datetime between '$today 00:00:00' and '$today 23:59:59'");

    while ($row = $st->fetch()) {
        $recorded = htmlspecialchars($row['datetime']);
        
    }


/*------------セリフ変化--------------*/
//瞑想途中終了
if(isset($_SESSION["mf_speak_flag"]) && $_SESSION["mf_speak_flag"] == "bfemo"){
    echo "最後まで記録されませんでした．<br />グラフで確認してください．";
}

//瞑想終了後
else if(isset($_SESSION["mf_speak_flag"]) && $_SESSION["mf_speak_flag"] == "end"){
    echo "瞑想おつかれさまでした．";
}

//グラフ
else if(isset($_SESSION["mf_speak_flag"]) && $_SESSION["mf_speak_flag"] == "graph"){
    echo "グラフはどうでしたか？";
}
/*
//出来事
else if(isset($_SESSION["mf_speak_flag"]) && $_SESSION["mf_speak_flag"] == "event"){
    if(!empty($recorded)){
        echo "今日はそんなことがあったんですね.<br />";
    }
    echo "おつかれさまです．";
}

//設定
else if(isset($_SESSION["mf_speak_flag"]) && $_SESSION["mf_speak_flag"] == "config"){
    echo "設定終了です！";
}
*/
else{
    echo "{$_SESSION['mf_userName']}さん,";
    $nowtime = date("G");
    $nowweek = date("w");

    if($nowtime >= 6 && $nowtime <= 10)
        echo "おはようございます．";
    elseif($nowtime >= 11 && $nowtime <= 16)
        echo "こんにちは．";
    else
        echo "こんばんは．";
/*
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
*/
}


if(empty($recorded)){
    echo "<br />今日の出来事を記録しましょう．";
}

if($_SESSION['mf_userPass'] == 'password'){
    echo "<br />初期パスワードから変更してください．";
}
