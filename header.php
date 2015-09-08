<?php
if(empty($_SESSION['userName'])){
    $_SESSION['login'] = "ログインしていません．";
    
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
        <script src="mind.js"></script>
        
    </head>