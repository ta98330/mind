<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>
    <script src="js/youtube.js"></script>
    <!--ページ領域-->
    <div data-role="page">
        
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="b" data-position="fixed">
            <h1>Mindfulness</h1>
        </div>
   
        <div role="main" class="ui-content">
            <h1>スタート</h1>
            <p>Mindfulnessを開始</p>

            
            <div id="video1"></div>

            <a href="#afemo" data-role="button">終わる</a>
            
        </div>
    </div>
    
    <!--ボタン・クリックで表示されるページ-->
        <div id="afemo" data-role="page">
            <div data-role="header" data-theme="b"
    data-add-back-btn="true" data-back-btn-text="戻る" data-back-btn-theme="a">
            <h1>Mindfulness</h1>
            </div>
            <div role="main" class="ui-content">
                <form action="impressions.php" method="post" data-ajax="false">
                    <h2>瞑想後の今の気分は？</h2>
                    <div class="ui-field-contain">
                        <input type="hidden" name="bfaf" value="af">
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend>怒り:</legend>
                            <input required type="radio" value="1" name="ang" id="ang1" data-mini="true">
                            <label for="ang1">感じない</label>
                            <input type="radio" value="2" name="ang" id="ang2" data-mini="true">
                            <label for="ang2">ほぼ感じない</label>
                            <input type="radio" value="3" name="ang" id="ang3" data-mini="true">
                            <label for="ang3">少し感じる</label>
                            <input type="radio" value="4" name="ang" id="ang4" data-mini="true">
                            <label for="ang4">感じる</label>
                        </fieldset>
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend>悲しみ:</legend>
                            <input required type="radio" value="1" name="sad" id="sad1" data-mini="true">
                            <label for="sad1">感じない</label>
                            <input type="radio" value="2" name="sad" id="sad2" data-mini="true">
                            <label for="sad2">ほぼ感じない</label>
                            <input type="radio" value="3" name="sad" id="sad3" data-mini="true">
                            <label for="sad3">少し感じる</label>
                            <input type="radio" value="4" name="sad" id="sad4" data-mini="true">
                            <label for="sad4">感じる</label>
                        </fieldset>
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend>不安:</legend>
                            <input required type="radio" value="1" name="anxiety" id="anxiety1" data-mini="true">
                            <label for="anxiety1">感じない</label>
                            <input type="radio" value="2" name="anxiety" id="anxiety2" data-mini="true">
                            <label for="anxiety2">ほぼ感じない</label>
                            <input type="radio" value="3" name="anxiety" id="anxiety3" data-mini="true">
                            <label for="anxiety3">少し感じる</label>
                            <input type="radio" value="4" name="anxiety" id="anxiety4" data-mini="true">
                            <label for="anxiety4">感じる</label>
                        </fieldset>
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend>喜び:</legend>
                            <input required type="radio" value="1" name="joy" id="joy1" data-mini="true">
                            <label for="joy1">感じない</label>
                            <input type="radio" value="2" name="joy" id="joy2" data-mini="true">
                            <label for="joy2">ほぼ感じない</label>
                            <input type="radio" value="3" name="joy" id="joy3" data-mini="true">
                            <label for="joy3">少し感じる</label>
                            <input type="radio" value="4" name="joy" id="joy4" data-mini="true">
                            <label for="joy4">感じる</label>
                        </fieldset>
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend>ストレス:</legend>
                            <input required type="radio" value="1" name="stress" id="stress1" data-mini="true">
                            <label for="stress1">感じない</label>
                            <input type="radio" value="2" name="stress" id="stress2" data-mini="true">
                            <label for="stress2">ほぼ感じない</label>
                            <input type="radio" value="3" name="stress" id="stress3" data-mini="true">
                            <label for="stress3">少し感じる</label>
                            <input type="radio" value="4" name="stress" id="stress4" data-mini="true">
                            <label for="stress4">感じる</label>
                        </fieldset>
                        <input type="submit" value="終わる" data-mini="true">
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
