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
            
        <!--3タブパネル全体を定義-->
        <div id="tabs" data-role="tabs">
            
          <!--2タブリストを準備-->
          <div data-role="navbar">
            <ul>
              <li><a href="#backbone" class="ui-btn-active">Backbone.js</a></li>
              <li><a href="#knockout">Knockout.js</a></li>
              <li><a href="#angular">AngularJs</a></li>
            </ul>
          </div>
            
          <!--1パネル（コンテンツ領域）を準備-->
          <div id="backbone" class="ui-body ui-body-a">
            <p>Backbone.jsは...</p>
          </div>
          <div id="knockout" class="ui-body ui-body-a">
            <p>Knockoutは...</p>
          </div>
          <div id="angular" class="ui-body ui-body-a">
            <p>Angular.jsは...</p>
          </div>
        </div>
        </div>
        



    </div>

    </body>
</html>