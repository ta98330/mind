<?php
/*エラー表示先で下記を設定
require "header.php";//ヘッダー読み込み
$reposi = "index.php";//戻り先
$mestitle = "ログインに失敗しました";//エラータイトル
$mescontent = "UserNameを入力して下さい．";//エラーメッセージ
*/
?>
<body>
    <!--ページ領域-->
    <div data-role="page" id="warning">
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <a href="<?=$reposi?>" class="home_btn"><i class="fa fa-chevron-left"></i></a>
            <h1>エラー</h1>
        </div>
        
        <div role="main" class="ui-content">
            <div id="warnmes">
                <h2><i class="fa fa-exclamation-triangle"></i> <?=$mestitle?></h2>
                <?=$mescontent?>
                <a href='<?=$reposi?>'>戻る</a>
            </div>
        </div><!--main-->
    </div><!--page-->
</body>
</html>