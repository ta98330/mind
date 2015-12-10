<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1">
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="pcbase.css">
        <link rel="shortcut icon" href="images/mindou.png">
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
		<title>研究用管理ページ</title>
		
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script src="admin.js"></script>
        
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
            
            
            if(_ua.Mobile){
                //この中のコードはスマホにのみ適用
                //alert("このページはPC専用です．\nログインページに移動します．")
                //location.href = "index.php";
            }else if(_ua.Tablet){
                //この中のコードはタブレットにのみ適用
                //location.href = "index.php";
            }else{
                //この中のコードはスマホとタブレット以外に適用
                /*
                if(window.confirm('PC用のページに移動しますか？')){
                    location.href = "index.html";
                }
                alert("このページはPC専用です．\nログインページに移動します．")
                location.href = "index.php";
                */
            }
        
        </script>
        
	</head>
    
    <body>