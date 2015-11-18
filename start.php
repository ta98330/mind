<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>
    <script src="js/youtube.js"></script>
    <!--ページ領域-->
    <div data-role="page">
        
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <h1>瞑想</h1>
        </div>
   
        <div role="main" class="ui-content">
            <p>※音量に注意してください</p>
            
            <div class="player">
                <audio id="sound" src="sounds/test5min.mp3"></audio>

                
                <div id="player_btns">
                    <a id="mute_btn" onclick="mute();"><i class="fa fa-volume-off"></i></a>
                    <a id="play_btn" onclick="play(); timeupdate();"><i class="fa fa-play"></i></a>
                    <a id="pause_btn" onclick="pause();"><i class="fa fa-pause"></i></a>
                    <a id="reset_btn" onclick="reset();"><i class="fa fa-stop"></i></a>
                </div>
                
                <span id="now_time">0m 0s</span>
                <span id="last_time">last</span>


                <div id="barBd"><div id="bar"></div></div>

                <script type="text/javascript">

                var TARGET = document.getElementById('sound');

                function play(){
                    TARGET.play();
                }

                function pause(){
                    TARGET.pause();
                }



                function reset(){
                    TARGET.pause();
                    TARGET.currentTime = 0;
                }

                function mute(){
                    if(TARGET.muted){
                        TARGET.muted = false;
                    }else{
                        TARGET.muted = true;
                    }
                }



                function timeupdate(){
                    TARGET.play();
                    TARGET.addEventListener("timeupdate", function() {
                        var NOW = Math.floor(TARGET.currentTime);


                        var NOWm = NOW % 3600 / 60 | 0;
                        var NOWs = NOW % 60;

                        document.getElementById('now_time').innerHTML = NOWm + 'm ' + NOWs +'s';

                        var LAST = (Math.round(TARGET.duration)) - (Math.floor(TARGET.currentTime));

                        var LASTm = LAST % 3600 / 60 | 0;
                        var LASTs = LAST % 60;

                        document.getElementById('last_time').innerHTML = LASTm + 'm ' + LASTs +'s';


                    }, true);
                }

                
                
                
                /*++ jQueryを使ったオリジナルプログレスバー ++*/


                $(function(){
                    $('a').click(function(){
                        if(!TARGET.paused){
                            var TOTAL = Math.round(TARGET.duration);
                            TARGET.addEventListener("timeupdate", function() {
                                var NOW   = Math.round(TARGET.currentTime);
                                var PERCE = (NOW / TOTAL * 100) + '%';
                                $('#bar').css({'width':PERCE});
                            }, true);
                        }
                    });
                });
                </script>

            </div><!--player-->

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
