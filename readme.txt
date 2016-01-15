【ソフト名】　　Mindfulness Webアプリ Ver1.02
【制作者】　　　情報物理研究室2015　三澤拓弥
【制作日】　　　2016/1/13　
【配布元】　　　http://buturi.heteml.jp/student/2015/misawa/
【推奨ブラウザ】PC：Google Chrome（最新バージョン）　※IEには非対応
　　　　　　　　スマートフォン：（iPhone）Safari　（Android）Chrome

－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
・はじめに
　本アプリは2015年度 近畿大学工学部情報システム工学科 情報物理研究室で卒業研究として制作した，ブラウザ上で動作するWebアプリです．
　スマートフォンで，iPhoneではSafari，AndroidではChromeで「ホーム画面に追加」をしてアプリライクに利用することを想定して制作していますが，PCでも利用することができます．

・ファイル構成
mindfulness_app.zip
  |--css
    |--jquery.mobile-1.4.5.min.css              jQuery Mobileのcss
    |--reset.css                                ブラウザのデフォルトデザインをリセットするcss
  |
  |--fonts
    |--font_1_honokamarugo_1.1.ttf              ほのかフォントさん(http://font.gloomy.jp/honoka-maru-gothic-dl.html)のほのか丸ゴシックのフォントファイル
  |
  |--image
    |--使用する画像11ファイル
  |
  |--js
    |--highcharts.js                            グラフ用ライブラリ(http://www.highcharts.com/)
    |--jquery.mobile-1.4.5.min.js               jQuery Mobileのスクリプト
  |
  |--movie
    |--瞑想動画4本
  |
  |--ad_login.php                               管理用ページのログインプログラム
  |--admin.js                                   管理用ページのスクリプト
  |--admin.php                                  管理用ページ本体部分
  |--admin_header.php                           管理用ページヘッダー部分
  |--base.css                                   アプリのcss
  |--bfemo.php                                  瞑想前評定画面
  |--config.php                                 設定画面
  |--csv.php                                    CSVファイル出力プログラム
  |--event.php                                  出来事画面
  |--event_insert.php                           出来事記録プログラム
  |--graph.php                                  グラフ画面
  |--header.php                                 ヘッダー部分
  |--impressions.php                            評定記録プログラム
  |--index.php                                  ログイン前画面
  |--login.php                                  ログインプログラム
  |--logout.php                                 ログアウトプログラム
  |--manifest.json                              Webマニフェストファイル
  |--mf_adlogin.php                             管理用ページログイン画面
  |--mind.js                                    アプリのスクリプト
  |--mind.php                                   キャラクタのセリフプログラム
  |--mindfulness_app.sql                        空のデータベースデータ
  |--pass_update.php                            パスワード変更プログラム
  |--pcbase.php                                 管理用ページのcss
  |--readme.txt                                 説明ファイル（本ファイル）
  |--signin.php                                 新規ユーザー登録プログラム
  |--spheader.php                               データベース設定
  |--start.php                                  瞑想前評定，瞑想画面
  |--top.php                                    ログイン後ホーム画面
  |--user_delete.php                            ユーザー消去プログラム
  |--warning.php                                エラーページプログラム

・利用方法
　1.readme.txtとmindfulness_app.sqlを除く全ファイルをWebサーバにアップロードする．
 
　2.利用するデータベース（MySQL以外動作未確認）にmindfulness_app.sqlをインポートする．
　　phpMyAdmin等で簡単にインポートできる．
 
　3.spheader.phpをエディターで開き，下記のようにデータベース名（サーバ名），ユーザ名，パスワードを入れ，上書き保存する．
　　$_SESSION['dbname'] = "mindfulness_app;host=サーバ名";
　　$_SESSION['dbusername'] = "データベースのユーザ名";
　　$_SESSION['dbpass'] = "データベースのパスワード";
  
　4.管理者のユーザ名は「admin」，初期パスワードは「pass」になっているので，アプリ，管理者用ページにログインできるか動作を確認する．