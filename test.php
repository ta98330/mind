<?php
    require "spheader.php";
    
    
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
            <p>※音量に注意してください</p>
            
            <div class="videoPlayer">
                <video id="video" src="sounds/n/test5minasdkou.mp4" poster="images/5min_info.png" width="100%" controls></video>
                <video id="video" src="sounds/n/test5minasdkou.mp4" poster="images/10min_info.png" width="100%" controls></video>
                
                <script>
                    var video = document.querySelector('video');
                    /*
                    video.onended = function(){
                        alert('最後まで再生されました');
                    }
                    */
                    video.addEventListener('ended', function(){
                        console.log('addEventListenerによるイベント発火');
                        location.href = "#afemo";
                    });
                </script>

            </div><!--videoPlayer-->

            <a href="#afemo" data-role="button">終わる</a>
            
        </div>
    </div>
    
</body>
</html>
