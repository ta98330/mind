<?php
    require "spheader.php";//ヘッダー読み込み 
        
    if($_SESSION['mf_login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    
    

    if((!empty($_POST['ang']))&&(!empty($_POST['sad']))&&(!empty($_POST['anxiety']))&&(!empty($_POST['joy']))&&(!empty($_POST['stress']))){
        $now = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        
        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
        
        $rep = 0;
        
        
        $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' AND (datetime BETWEEN '$today 00:00:00' AND '$today 23:59:59') AND datetime = (SELECT MAX(datetime) FROM mf_impressions)");//本日最後のデータを検索
        
        while ($row = $st->fetch()) {
            $rep = htmlspecialchars($row['rep']);
        }
        
        if($_POST['bfaf'] == 'bf')
        $rep++;
        
        
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