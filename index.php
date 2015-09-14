<?php
    require "spheader.php";
    
    if(@$_SESSION['login'] == "ログイン中！"){
        header('Location: top.php');
    }
    require "header.php";//ヘッダー読み込み
?>

    
    <body>
        <?php require "navbar.php";//ナビゲーションバー読み込み?>
        
        <div class="container" style="padding-top: 20px 0;" id="main">
            <h1>Mindfulnessとは</h1>
            <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-<a href="http://mindfulness.jp.net/" target="_blank">日本マインドフルネス学会- 公式サイト</a>より引用</p>
            <!--
            <p class='alert alert-danger' role='alert'>現在メンテナンス中です．利用できません．</p>-->
            
            <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary center-block">始める</a>

            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                    <h1>ログイン</h1>
                        <form method="post" action="login.php">
                        <input type="text" name="username" placeholder="UserName" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <input type="submit" class="login loginmodal-submit" value="ログイン">
                        </form>
                        

                        <div class="login-help">
                        <a href="#" data-toggle="modal" data-target="#signin-modal">初めての方はこちら</a>
                        </div>
                    </div>
                </div>
            </div>
            
        
        
            

            <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                    <h1>新規登録</h1>
                        <form method="post" action="signin.php">
                        <input type="text" name="username" placeholder="UserName" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <input type="submit" class="login loginmodal-submit" value="新規登録">
                        </form>

                        
                    </div>
                </div>
            </div>
        
        </div>
        
        
        
        
        
<?php require "footer.php" //フッター読み込み?>