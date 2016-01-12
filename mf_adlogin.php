<?php
    require "spheader.php";
    //既ログイン処理
    if(isset($_SESSION["mf_ad_login"])){
        header('Location: admin.php');
    }
    require "admin_header.php";//ヘッダー読み込み
?>
        <h1>Mindfulness研究管理ページ</h1>
        <h2><i class="fa fa-sign-in"></i> 管理者ログイン</h2>
        <form method="post" action="ad_login.php" data-ajax="false">
            <input type="text" name="administrator" placeholder="UserName" required>
            <input type="password" name="admin_pass" placeholder="Password" required>
            <input type="submit" name="action" value="ログイン">
        </form>
    </body>
</html>