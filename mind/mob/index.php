<?php
    require "../spheader.php";
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        
        <link rel="stylesheet" href="mobile.css">
        
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
        
        <div id="splash">
            <h1>Mindfulnessとは</h1>
            <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-日本マインドフルネス学会-</p>
        </div>
        
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
    
    
        <section id="login">
            <h1>ログイン</h1>
            <form class="form" name="iform" action="login.php" method="post">
              ID<br><input type="number" name="id" required><br>
              パスワード<br><input type="password" name="pass" required><br>
              <input type="submit" value="ログイン">
            </form>
        </section>
    
        
        <form name="timer">
            <input type="text" value="0">分
            <input type="text" value="0">秒<br>
            <input type="button" value="スタート" onclick="cntStart()">
            <input type="button" value="ストップ" onclick="cntStop()">
        </form>
        
        
        <section>
            <h1>学生出席確認検索</h1>
            <form action="../test.php" method="post">
                ID<input type="text" name="id"><br />
                感想
                <select name="evaluation">
                    <option value="実感アリ">実感アリ</option>
                    <option value="普通">普通</option>
                    <option value="実感ナシ">実感ナシ</option>
                </select>
                
                <input type="submit">
            </form>
        
        
        
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </body>
</html>