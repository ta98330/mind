<?php
    require "spheader.php";//ヘッダー読み込み 
        
    if($_SESSION['mf_login'] == "ログインしていません．"){
        header('Location: index.php');
    }
        
    require "header.php";//ヘッダー読み込み
    
?>
<meta http-equiv="refresh" content="5;URL=top.php">
<section id="passage">
    <?php
    if(!empty($_POST['pass']) && !empty($_POST['newPass'])){
        if($_SESSION['mf_userPass'] == $_POST['pass']){
          $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
          $st = $pdo->prepare("UPDATE mf_user SET pass = ? WHERE id = {$_SESSION['mf_userId']}");
          $st->execute(array($_POST['newPass']));

          $_SESSION['mf_userPass'] = $_POST['newPass'];
          echo '<p>パスワードを変更しました。</p>';
        }
        else
            echo "<p class='alert alert-danger' role='alert'>パスワードが違います．<br /><a href='index.php'>戻る</a></p>"; 
    }
    else
        echo "<p class='alert alert-danger' role='alert'>パスワードを入力してください．<br /><a href='index.php'>戻る</a></p>";
    ?>
    <p>5秒後に自動で戻ります．<a href="top.php">戻る</a></p>

</section>

<?php require "footer.php" //フッター読み込み?>