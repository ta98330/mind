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
    <div id="config" data-role="page" data-url="./config.php">

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
            
            <h2>動画テスト</h2>
            <div class="videoPlayer">
                <video id="video" src="sounds/n/test5minasdkou.mp4" width="100%" controls></video>
                
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