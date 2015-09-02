<?php
    require "spheader.php";//ヘッダー読み込み 
        
    if($_SESSION['login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    require "header.php";//ヘッダー読み込み
    
?>
<!--<meta http-equiv="refresh" content="3;URL=top.php">-->
<section id="passage">
    <?php
    if((!empty($_POST['ang']))&&(!empty($_POST['sad']))&&(!empty($_POST['joy']))&&(!empty($_POST['stress']))){
        $now = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        
        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        
        $rep = 0;
        $bfaf = 'af';
        
        $st = $pdo->query("SELECT * FROM mf_impressions WHERE datetime = (SELECT MAX(datetime) FROM mf_impressions) AND (datetime BETWEEN '$today 00:00:00' AND '$today 23:59:59')");//本日最後のデータを検索
        
        while ($row = $st->fetch()) {
            $rep = htmlspecialchars($row['rep']);
            $bfaf = htmlspecialchars($row['bfaf']);
        }
        
        if($bfaf == 'bf'){
            $bfaf = 'af';
        }
        else{
            $bfaf = 'bf';
            $rep++;
        }
        
        
        //記録
        $st = $pdo->query("INSERT INTO mf_impressions VALUES({$_SESSION['userId']},'$rep','$now','$bfaf',{$_POST['ang']},{$_POST['sad']},{$_POST['joy']},{$_POST['stress']})");
        
        echo "<p>感想を記録しました．</p>";
        //デバッグ
        echo "ID ","{$_SESSION['userId']}"," 回数 ",$rep," 時間 ",$now," 前後 ",$bfaf," 怒り ",$_POST['ang']," 悲しみ ", $_POST['sad']," 喜び ", $_POST['joy']," ストレス ", $_POST['stress'];
    }
    else{
        echo "<p>選択が足りません．</p>";
    }
    ?>
    <a href="top.php">戻る</a>
    <p>3秒後に自動で戻ります．</p>

</section>
<?php require "footer.php" //フッター読み込み?>