<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
    
    <body>
        
        
        <!--ページ領域-->
        <div id="home" data-role="page" data-url="./top.php">

            <!--ヘッダー領域-->
            <div data-role="header" data-theme="b">
                <h1>Mindfulness</h1>
                <a href="logout.php" class="ui-btn ui-btn-a ui-btn-right">ログアウト</a>
            </div>

            <!--メイン領域-->
            <div role="main" class="ui-content" data-dom-cache="true">
                <div id="topinfo">
                    <p><?php include_once('mind.php')?></p>
                    
                </div>
                
                <div id="image">
                    <p id="image1"></p><p id="image2"></p>
                </div>
                
                
                <div class="char">
                    <img src="images/char02.png" alt="No image" class="dolphin">
                </div>
                
                <div id="strmenus">
                    <a href="bfemo.php" data-role="button" class="ui-btn strbtn">瞑想スタート</a>
                    <div id="subbtns">
                    <a href="event.php" data-role="button" class="ui-btn subbtn" id="sub1">出来事</a>
                    <a href="graph.php" data-role="button" class="ui-btn subbtn" id="sub2">グラフ</a>
                    <a href="config.php" data-role="button" class="ui-btn subbtn" id="sub3">設定</a>
                    </div>
                </div>
                
            </div><!--メイン領域-->
        </div><!--home-->
    </body>
</html>