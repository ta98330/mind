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
    <div data-role="page" data-url="./config.php">

        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <a href="top.php" class="home_btn"><i class="fa fa-chevron-left"></i></a>
            <h1>設定</h1>
        </div>

        <div role="main" class="ui-content">
            <?php $_SESSION["mf_speak_flag"] = "config"; //セリフ?>
            <h2>通知設定</h2>
            <p>毎日19時に通知されます</p>
            <div class="pushnate-notification-button" data-site-id="12"></div>
            <script>
            (function(w, d, s, path) {
              tag = d.createElement(s);
              firstTag = d.getElementsByTagName(s)[0];
              tag.async = 1;
              tag.src = path;
              firstTag.parentNode.insertBefore(tag, firstTag);
            })(window, document, 'script', 'https://pushnate.com/pnbt.js');
            </script>

            <h2>パスワード変更</h2>
            <form class="form" role="form" method="post" name="pass_insert" action="pass_update.php" accept-charset="UTF-8" id="login-nav" data-ajax="false">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword1">現在のパスワード</label>
                    <input type="password" class="form-control" name="pass" placeholder="現在のパスワード" required>
                    <label class="sr-only" for="exampleInputPassword2">新しいパスワード</label>
                    <input type="password" class="form-control" name="newPass" placeholder="新しいパスワード" required>
                    <button type="submit" class="btn btn-primary btn-block">変更</button>
                </div>
            </form>

            <h2>管理者メールアドレス</h2>
            <img class="img-responsive" src="images/mail.gif" alt="">
            
            <h2>音声テスト</h2>
            <div class="player">
                <audio id="sound" src="sounds/n3test5min.mp3"></audio>

                
                <div id="player_btns">
                    <a id="mute_btn" onclick="mute();"><i class="fa fa-volume-off"></i></a>
                    <a id="play_btn" onclick="play(); timeupdate();"><i class="fa fa-play"></i></a>
                    <a id="pause_btn" onclick="pause();"><i class="fa fa-pause"></i></a>
                    <a id="reset_btn" onclick="reset();"><i class="fa fa-stop"></i></a>
                </div>
                
                <span id="now_time">0m 0s</span>
                <span id="last_time">5m 0s</span>


                <div id="barBd"><div id="bar"></div></div>

                <script type="text/javascript">
/*
                var TARGET = document.getElementById('sound');

                function play(){
                    TARGET.play();
                    TARGET.addEventListener("ended", function(){
                        console.log("再生終了")
                        //location.href = "#afemo";
                    }, false);
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
            
            
            <h2>動画テスト</h2>
            <div class="videoPlayer">
                <video id="video" src="sounds/sox.mp4" width="100%" controls></video>
                
                <script>
                    var video = document.querySelector('video');
                    /*
                    video.onended = function(){
                        alert('最後まで再生されました');
                    }
                    */
                    video.addEventListener('ended', function(){
                        console.log('addEventListenerによるイベント発火');
                        //location.href = "#afemo";
                    });
                </script>

            </div><!--videoPlayer-->
            
           
            
            
            
            
            
            
            
            
        </div>



    </div>

    </body>
</html>