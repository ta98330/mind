<?php
    require "spheader.php";
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    
    if((isset($_POST['ang']))&&(isset($_POST['sad']))&&(isset($_POST['anxiety']))&&(isset($_POST['joy']))&&(isset($_POST['stress']))){
        $now = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        
        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        
        
        /*-------瞑想後なし処理(前回の評定で瞑想後の記録が無い)---------*/
        //最新データを検索
        $st = $pdo->query("SELECT * FROM mf_impressions WHERE datetime = (SELECT max(datetime) FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' GROUP BY id)");
        
        while ($row = $st->fetch()) {
            $last_bfaf = htmlspecialchars($row['bfaf']);
        }
        
        //postデータが瞑想前，最新データも瞑想前 --> 最新データを消去
        if(isset($last_bfaf) && $_POST['bfaf'] == 'bf' && $last_bfaf == 'bf'){
            $st = $pdo->query("DELETE FROM mf_impressions WHERE datetime = (SELECT last_date FROM (SELECT max(datetime) AS last_date FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' GROUP BY id) AS temp1)");
        }
        
        
        $rep = 0;
        
        //本日最後のデータを検索
        $st = $pdo->query("SELECT * FROM mf_impressions WHERE datetime = (SELECT max(datetime) FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' AND (datetime BETWEEN '$today 00:00:00' AND '$today 23:59:59') GROUP BY id)");
        
        while ($row = $st->fetch()) {
            $rep = htmlspecialchars($row['rep']);
            $bfaf = htmlspecialchars($row['bfaf']);
        }
        
        if($_POST['bfaf'] == 'bf'){
            $rep++;
        }
        
        //記録
        $st = $pdo->query("INSERT INTO mf_impressions VALUES({$_SESSION['mf_userId']},'$rep','$now','{$_POST['bfaf']}',{$_POST['ang']},{$_POST['sad']},{$_POST['anxiety']},{$_POST['joy']},{$_POST['stress']})");
        
        if($_POST['bfaf'] == 'bf'){
            header('Location: start.php');
        }
        else{
            //セリフ
            $_SESSION["mf_speak_flag"] = "end";
            
            header('Location: top.php');
        }
        
    }
    else{
         require "header.php";//ヘッダー読み込み
        $reposi = "top.php";//戻り先
        $mestitle = "記録できませんでした．";//エラータイトル
        $mescontent = "選択項目が足りません．もう一度やり直してください．";//エラーメッセージ
        require "warning.php"; //エラーページ読み込み
        
    }