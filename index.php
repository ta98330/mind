<?php
    require "spheader.php";
    
    if(@$_SESSION['mf_login'] == "ログイン中！"){
        header('Location: top.php');
    }
    require "header.php";//ヘッダー読み込み
?>

    
    <body>
        <!--ページ領域-->
        <div data-role="page">
            <!--ヘッダー領域-->
            <div data-role="header" data-theme="b">
                <h1>Mindfulness</h1>
            </div>

            <div role="main" class="ui-content">
                <h2>Mindfulnessとは</h2>
                <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-<a href="http://mindfulness.jp.net/" target="_blank">日本マインドフルネス学会- 公式サイト</a>より引用</p>
            
                <a href="#login" data-rel="popup" class="ui-btn">はじめる</a>
            
                <div id="login" data-role="popup">
                    <h3>ログイン</h3>
                    <form method="post" action="login.php">
                        <input type="text" name="username" placeholder="UserName" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <input type="submit" class="login loginmodal-submit" value="ログイン">
                    </form>
                </div>
            </div>
            
            
        </div>
    </body>
</html>