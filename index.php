<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログイン中！"){
        header('Location: top.php');
    }
    require "header.php";//ヘッダー読み込み
?>

    
    <body>
        <?php require "navbar.php";//ナビゲーションバー読み込み?>
        
        
        
        
        
        <div class="container" style="padding-top: 20px 0;" id="main">
            <h1>Mindfulnessとは</h1>
            <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-日本マインドフルネス学会-</p>
        </div>
        
        
    
    
    
        
    
<?php require "footer.php" //フッター読み込み?>