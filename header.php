<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#22bfe5">
        <link rel="stylesheet" href="css/reset.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
        
        <link rel="manifest" href="/manifest.json">
        <link rel="shortcut icon" href="images/mindou.png">
        <link rel="apple-touch-icon" href="images/mindou.png" />
        
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript"><!--
        $(document).bind('mobileinit',function(){
            $.mobile.page.prototype.options.keepNative
                = ".data-role-none, .data-role-none *";
        });
        // -->
        </script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        
        
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        
        <script type="text/javascript" src="js/highcharts.js"></script>
        
        <link rel="stylesheet" href="base.css">
        
        
        
        <title>Mindfulness</title>
        
        <script type="text/javascript">
        //https://w3g.jp/blog/js_browser_sniffing2015
        //スマホの判定に使用
        /*
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
            
            
            if(_ua.Mobile){
                //この中のコードはスマホにのみ適用
            }else if(_ua.Tablet){
                //この中のコードはタブレットにのみ適用
            }else{
                //この中のコードはスマホとタブレット以外に適用
                if(window.confirm('PC用のページに移動しますか？')){
                    location.href = "index.html";
                }
            }
        */
        </script>
        
        <script src="mind.js"></script>
        
        
    </head>