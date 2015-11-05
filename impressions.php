<?php
    require "spheader.php";//ヘッダー読み込み 
        
    if($_SESSION['mf_login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    
    

    if((!empty($_POST['ang']))&&(!empty($_POST['sad']))&&(!empty($_POST['anxiety']))&&(!empty($_POST['joy']))&&(!empty($_POST['stress']))){
        $now = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        
        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        
        
        /*-------瞑想後なし処理---------*/
        //最新データを検索
        $st = $pdo->query("SELECT * FROM mf_impressions WHERE datetime = (SELECT max(datetime) FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' GROUP BY id)");
        
        while ($row = $st->fetch()) {
            $last_bfaf = htmlspecialchars($row['bfaf']);
        }
        
        //postデータが瞑想前，最新データも瞑想前 --> 最新データを消去
        if($_POST['bfaf'] == 'bf' && $last_bfaf == 'bf'){
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
            header('Location: top.php');
        }
        
        /*
        echo "<p>感想を記録しました．</p>";
        //デバッグ
        echo "ID ","{$_SESSION['mf_userId']}"," 回数 ",$rep," 時間 ",$now," 前後 ",$_POST['bfaf']," 怒り ",$_POST['ang']," 悲しみ ", $_POST['sad']," 不安 ", $_POST['anxiety']," 喜び ", $_POST['joy']," ストレス ", $_POST['stress'];*/
    }
    else{
        require "header.php";//ヘッダー読み込み
        echo "<p class='alert alert-danger' role='alert'>選択が足りません．</p>";
    }
    ?>
    <a href="top.php">戻る</a>
    


<?php require "footer.php" //フッター読み込み?>