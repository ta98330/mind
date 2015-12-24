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
                <video id="video1" src="sounds/n/test5minasdkou.mp4" poster="images/5min_info.jpg" width="100%" controls></video>
                <video id="video2" src="sounds/n/test5minasdkou.mp4" poster="images/5min_noinfo.jpg" width="100%" controls></video>
                <video id="video3" src="sounds/n/test5minasdkou.mp4" poster="images/10min_info.jpg" width="100%" controls></video>
                <video id="video4" src="sounds/n/test5minasdkou.mp4" poster="images/10min_noinfo.jpg" width="100%" controls></video>
                
                <script>
                    function videoend(videoId){
                        var video = document.getElementById(videoId)
                        
                        video.onended = function(){
                            alert('最後まで再生されました');
                        }
                        /*
                        video.addEventListener('ended', function(){
                            console.log('addEventListenerによるイベント発火');
                            //location.href = "#afemo";
                        });
                        */
                    }
                    
                    videoend('video1');
                    videoend('video2');
                    videoend('video3');
                    videoend('video4');
                    
                    
                </script>
                
                
            </div><!--videoPlayer-->

            <a href="#afemo" data-role="button">終わる</a>
            
        </div>
    </div>
    
</body>
</html>
