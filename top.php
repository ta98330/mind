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
    <body>
        <!--ページ領域-->
        <div data-role="page" id="home" data-url="./top.php" data-dom-cache="true">
            <!--ログアウト確認-->
            <div id="logout" data-role="popup" data-position-to="window" data-overlay-theme="b" data-shadow="false">
                <h3>本当にログアウトしますか？</h3>
                <p><a href="logout.php">はい</a><a href="#" data-rel="back">いいえ</a></p>
            </div>
            
            <!--ヘッダー領域-->
            <div data-role="header" data-theme="z" class="data-role-none header">
                <h1>Mindfulness</h1>
                <a href="#logout" data-rel="popup" data-transition="pop" class="logout_btn"><i class="fa fa-sign-out rotation180"></i><br /><span class="min">ログアウト</span></a>
                <a href="config.php" class="config_btn"><i class="fa fa-cog"></i></a><!--設定-->
            </div>

            <!--メイン領域-->
            <div role="main" class="ui-content data-role-none">
                <div id="topinfo">
                    <p><?php include_once('mind.php')?></p>
                    <div id="image">
                        <p id="image1"></p><p id="image2"></p>
                    </div>

                    <div class="char">
                        <img src="images/char02.png" alt="No image" class="dolphin">
                    </div>
                </div>
                
                <div id="strmenus">
                    <a href="bfemo.php" data-role="button" class="ui-btn strbtn"><img src="images/yoga.png" alt=""> 瞑想開始</a>
                    <div id="subbtns">
                        <a href="event.php" data-role="button" class="ui-btn subbtn" id="sub1"><i class="fa fa-pencil-square-o"></i> 出来事</a>
                        <form action="graph.php" method="post" data-ajax="false">
                            <input type="hidden" name="period_week" value="week">
                            <button data-role="none" class="ui-btn subbtn" id="sub2"><i class="fa fa-line-chart"></i> グラフ</button>
                        </form>
                    </div>
                </div>
                
                
            </div><!--メイン領域-->
        </div><!--home-->
    </body>
</html>