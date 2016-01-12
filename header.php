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
        <link rel="manifest" href="/manifest.json">
        <link rel="shortcut icon" href="images/mindou.png">
        <link rel="apple-touch-icon" href="images/mindou.png" />
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
        $(document).bind('mobileinit',function(){
            $.mobile.page.prototype.options.keepNative
                = ".data-role-none, .data-role-none *";
        });
        </script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" src="js/highcharts.js"></script>
        <link rel="stylesheet" href="base.css">
        <title>Mindfulness</title>
        <script src="mind.js"></script>
    </head>