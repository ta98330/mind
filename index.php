<?php
    require "spheader.php";
    /*
    if($_SESSION['login'] != "ログインしていません．"){
        header('Location:top.php');
    }
    */
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
    
    
    
        <div class = "container">
            <div class="wrapper">
                <form action="login.php" method="post" name="Login_Form" class="form-signin">       
                    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                      <hr class="colorgraph"><br>

                      <input type="number" class="form-control" name="id" placeholder="UserID" required="" autofocus="">
                      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>     		  

                      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
                </form>			
            </div>
        </div>
    
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </body>
</html>