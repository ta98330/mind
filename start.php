<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>
    <!--ページ領域-->
    <div id="start" data-role="page" data-url="./start.php">
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <h1>瞑想</h1>
        </div>
   
        <div role="main" class="ui-content">
            <p><i class="fa fa-volume-up"></i> 音量に注意してください</p>
            
            <div class="videoPlayer">
                <h2><img src="images/biginer.png" alt="">初心者用</h2>
                <video id="video1" src="movie/5-1.mp4" poster="images/5min_info3.jpg" width="100%" controls></video>
                <video id="video2" src="movie/10-1.mp4" poster="images/10min_info3.jpg" width="100%" controls></video>
                <h2>中級者用</h2>
                <video id="video3" src="movie/5-2.mp4" poster="images/5min_noinfo3.jpg" width="100%" controls></video>
                <video id="video4" src="movie/10-2.mp4" poster="images/10min_noinfo3.jpg" width="100%" controls></video>
                
                <script>
                    function videoend(videoId){
                        var video = document.getElementById(videoId)
                        /*
                        video.onended = function(){
                            alert('最後まで再生されました');
                        }
                        */
                        video.addEventListener('ended', function(){
                            console.log('addEventListenerによるイベント発火');
                            location.href = "#afemo";
                        });
                        
                    }
                    
                    videoend('video1');
                    videoend('video2');
                    videoend('video3');
                    videoend('video4');
                    
                </script>

            </div><!--videoPlayer-->

            <a href="#afemo" data-role="button">終わる</a>
        </div><!--main-->
    </div><!--page-->
    
    <!--ボタン・クリックで表示されるページ-->
    <div id="afemo" data-role="page">
        <div data-role="header" data-theme="z" class="data-role-none header">
            <h1>今の気分は？</h1>
        </div>
        <div role="main" class="ui-content">
            <form action="impressions.php" method="post" data-ajax="false">
                <input type="hidden" name="bfaf" value="af">
                <h2>感じない　→　感じる</h2>
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
        </div><!--main-->
    </div><!--page-->
</body>
</html>
