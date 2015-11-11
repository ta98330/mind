<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
    
    <body>
        
        
        <div id="bfemo" data-role="page" data-url="./bfemo.php">
            <div data-role="header" data-theme="b">
            <a href="top.php" class="ui-btn ui-btn-a ui-btn-left">Home</a>
            <h1>Mindfulness</h1>
            </div>
            <div role="main" class="ui-content">
                <form action="impressions.php" method="post" data-ajax="false">
                    <h2>今の気分は？</h2>
                    <div class="ui-field-contain">
                        <input type="hidden" name="bfaf" value="bf">
                        <h3>感じない　＞＞＞　感じる</h3>
                        <div class="ui-field-contain">
                            <label for="ang">怒り:</label>
                            <input id="ang" name="ang" type="range" min="1" max="10" step="1" value="5">
                            <label for="sad">悲しみ:</label>
                            <input id="sad" name="sad" type="range" min="1" max="10" step="1" value="5">
                            <label for="anxiety">不安:</label>
                            <input id="anxiety" name="anxiety" type="range" min="1" max="10" step="1" value="5">
                            <label for="joy">喜び:</label>
                            <input id="joy" name="joy" type="range" min="1" max="10" step="1" value="5">
                            <label for="stress">ストレス:</label>
                            <input id="stress" name="stress" type="range" min="1" max="10" step="1" value="5">
                        </div>
                        
                        
                        <input type="submit" value="始める" data-mini="true">
                    </div>
                </form>
            </div>
        </div>
</body>
</html>