<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body ontouchmove="event.preventDefault()">
    <script src="js/youtube.js"></script>
    <!--ページ領域-->
    <div data-role="page">
        
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <h1>瞑想</h1>
        </div>
   
        <div role="main" class="ui-content">
            <p>※音量に注意してください</p>

            <div id="video1"></div>

            <a href="#afemo" data-role="button">終わる</a>
            
        </div>
    </div>
    
    <!--ボタン・クリックで表示されるページ-->
    <div id="afemo" data-role="page">
        <div data-role="header" data-theme="z" class="data-role-none header">
            <h1>今の気分は？</h1>
        </div>
        <div role="main" class="ui-content">
            <form action="impressions.php" method="post" data-ajax="false">
                <input type="hidden" name="bfaf" value="af">
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
                <input type="submit" value="終わる" data-mini="true">
            </form>
        </div>
    </div>
</body>
</html>
