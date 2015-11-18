<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み

    //セリフ
    $_SESSION["mf_speak_flag"] = "bfemo";
?>
    
    <body>
        
        
        <div id="bfemo" data-role="page" data-url="./bfemo.php">
            <div data-role="header" data-theme="z" class="data-role-none header">
            <a href="top.php" class="home_btn"><i class="fa fa-chevron-left"></i></a>
            <h1>今の気分は？</h1>
            </div>
            <div role="main" class="ui-content">
                <form action="impressions.php" method="post" data-ajax="false">
                    <div class="ui-field-contain">
                        <input type="hidden" name="bfaf" value="bf">
                        <h2>感じない　→　→　→　感じる</h2>
                        <div class="ui-field-contain">
                            <label for="ang">怒り:</label>
                            <input id="ang" name="ang" type="range" min="1" max="10" step="1" value="5" data-popup-enabled="true" data-highlight="true">
                            <label for="sad">悲しみ:</label>
                            <input id="sad" name="sad" type="range" min="1" max="10" step="1" value="5" data-popup-enabled="true" data-highlight="true">
                            <label for="anxiety">不安:</label>
                            <input id="anxiety" name="anxiety" type="range" min="1" max="10" step="1" value="5" data-popup-enabled="true" data-highlight="true">
                            <label for="joy">喜び:</label>
                            <input id="joy" name="joy" type="range" min="1" max="10" step="1" value="5" data-popup-enabled="true" data-highlight="true">
                            <label for="stress">ストレス:</label>
                            <input id="stress" name="stress" type="range" min="1" max="10" step="1" value="5" data-popup-enabled="true" data-highlight="true">
                        </div>
                        
                        
                        <input type="submit" value="始める" data-mini="true">
                    </div>
                </form>
            </div>
        </div>
</body>
</html>