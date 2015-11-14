<?php
    require "spheader.php";
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }

    require "header.php";//ヘッダー読み込み
    
    //セリフ
    //$_SESSION["mf_speak_flag"] = "home";
?>
    
    <body ontouchmove="event.preventDefault()">
        <!--ページ領域-->
        <div data-role="page" id="home" data-url="./top.php" data-dom-cache="true">

            <!--ヘッダー領域-->
            <div data-role="header" data-theme="z" class="data-role-none header">
                <h1>Mindfulness</h1>
                <a href="logout.php" class="logout_btn"><i class="fa fa-sign-out"></i><br /><span class="min">ログアウト</span></a>
            </div>

            <!--メイン領域-->
            <div role="main" class="ui-content data-role-none">
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
                    <!--<a href="graph.php" data-role="button" class="ui-btn subbtn" id="sub2">グラフ</a>-->
                        
                    <form action="graph.php" method="post" data-ajax="false">
                        <input type="hidden" name="period_week" value="week">
                        <button data-role="none" class="ui-btn subbtn" id="sub2">グラフ</button>
                    </form>
                        
                    <a href="config.php" data-role="button" class="ui-btn subbtn" id="sub3">設定</a>
                    </div>
                </div>
                
            </div><!--メイン領域-->
        </div><!--home-->
    </body>
</html>