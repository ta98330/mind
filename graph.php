<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
    <body>

    <!--ページ領域-->
    <div data-role="page" data-url="./graph.php">

        <!--ヘッダー領域-->
        <div data-role="header" data-theme="b" data-position="fixed">
            <a href="top.php" class="ui-btn ui-btn-a ui-btn-left">Home</a>
            <h1>グラフ</h1>
        </div>

        <div role="main" class="ui-content">
            現在利用できません．
        </div>



    </div>

    </body>
</html>