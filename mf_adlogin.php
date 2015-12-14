<?php
    require "spheader.php";
    //既ログイン処理
    if(isset($_SESSION["mf_login"]) && $_SESSION['mf_login'] == "ログイン中！"){
        header('Location: top.php');
    }
    //既ログイン処理
    if(isset($_SESSION["mf_ad_login"])){
        header('Location: admin.php');
    }
    
    require "admin_header.php";//ヘッダー読み込み
?>

    <body>
        <div id="admin_login" data-role="popup" data-position-to="window" data-overlay-theme="b" data-shadow="false">
            <h3><i class="fa fa-sign-in"></i> 管理者ログイン</h3>
            <form method="post" action="ad_login.php" data-ajax="false">
                <input type="text" name="administrator" placeholder="UserName" required>
                <input type="password" name="admin_pass" placeholder="Password" required>
                <input type="submit" name="action" class="login loginmodal-submit" value="ログイン">
            </form>
        </div>
    </body>
</html>