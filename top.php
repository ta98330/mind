<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || $_SESSION['userName'] == NULL){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="base.css">
        
        <link rel="apple-touch-icon" href="images/clip.png" />
        
        <title>Mindfulness</title>
        
        <script type="text/javascript">
        //https://w3g.jp/blog/js_browser_sniffing2015
        //スマホの判定に使用
        var _ua = (function(u){
            return {
                Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1)
                  || u.indexOf("ipad") != -1
                  || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
                  || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
                  || u.indexOf("kindle") != -1
                  || u.indexOf("silk") != -1
                  || u.indexOf("playbook") != -1,
                Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
                  || u.indexOf("iphone") != -1
                  || u.indexOf("ipod") != -1
                  || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
                  || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
                  || u.indexOf("blackberry") != -1
                }
            })(window.navigator.userAgent.toLowerCase());
            /*
            
            if(_ua.Mobile){
            //この中のコードはスマホにのみ適用
            }else if(_ua.Tablet){
            //この中のコードはタブレットにのみ適用
            }else{
            //この中のコードはスマホとタブレット以外に適用
                if(window.confirm('PC用のページに移動しますか？')){
                location.href = "index.html";
            }
            */
        }
        </script>
        <script src="timer.js"></script>
        
    </head>
    
    <body>
        <header>
            <h1>Mindfulness</h1>
        </header>
        
        
        <div id="bpush_button" style="display: inline-block;" 
             data-site="214" data-back="http://buturi.heteml.jp/student/2015/misawa/test/mind/"
             data-height="20" data-width="60"></div>
    
        <script>
            //通知
            (function(d,s,ns){
              var ns = d.createElement(s);
                ns.async=1;ns.src="//bpush.net/connect/button.js";
                var s0=d.getElementsByTagName(s)[0];
              s0.parentNode.insertBefore(ns, s0);
            })(document,'script');
        </script>
    
    

        <div class="container" style="padding-top: 20px 0;">
            
            <ul class="nav nav-tabs">
                <li class="active"><a href="#start" data-toggle="tab">スタート</a></li>
                <li><a href="#event" data-toggle="tab">出来事</a></li>
                <li><a href="#graf" data-toggle="tab">グラフ</a></li>
                <li><a href="#config" data-toggle="tab">設定</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane activ" id="start">
                    <h1>スタート</h1>
                    <p>Mindfulnessを開始</p>
                    <section>
                        <h1>感想</h1>
                        <form action="../test.php" method="post">
                            ID<input type="text" name="id"><br />
                            感想
                            <select name="evaluation">
                                <option value="実感アリ">実感アリ</option>
                                <option value="普通">普通</option>
                                <option value="実感ナシ">実感ナシ</option>
                            </select>
                            
                            <input type="radio" name="anger" value="1">

                            <input type="submit">
                        </form>



                    </section>
                </div>
                <div class="tab-pane" id="event">
                    <h1>出来事</h1>
                    <p>その日の出来事</p>
                </div>
                <div class="tab-pane" id="graf">
                    <h1>グラフ</h1>
                    <p>気分の変動</p>
                    
                    <form>
                        <div class="form-group">
                            
                        </div>
                    </form>
                    
                    
                    
                </div>
                <div class="tab-pane" id="config">
                    <h1>設定</h1>
                    <p>プロフィールなど</p>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
        
        
        
        
        
        
        
        
        <footer id="footer">
          <a href="top.php">トップページ</a> |
          <a href="logout.php">ログアウト</a>
        </footer>
        
        
        
        
        
        
        
        
        
        
        
    </body>
</html>