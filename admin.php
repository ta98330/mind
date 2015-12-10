<?php
    require "spheader.php";

    //未ログイン処理
    if(!isset($_SESSION["mf_ad_login"])){
        header('Location: index.php');
    }
    require "admin_header.php";
?>

        <!-- ヘッダ　-->
        <header>
            <h1><a href="admin.php">Mindfulness研究管理ページ</a></h1>
            
            <!-- メニュー-->
            <nav id="headerNav">
                <ul>
                    <li><a href="#info">インフォメーション</a></li>
                    <li><a href="#info">CSV出力</a></li>
                    <li><a href="#info">新規ユーザー登録</a></li>
                    <li><a href="#info">ユーザー削除</a></li>
                    <li><a href="index.php">Mindfulnessアプリ</a></li>
                </ul>
            </nav>
            
        </header>
        
        
        
        <section>
            <h2>CSV出力</h2>
            <form method="post" action="csv.php">
                <labe>ユーザー:
                    <select name="id">
                    <?php
                    
                    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                    
                    $number = -1;
                        
                    $st = $pdo->query("SELECT * FROM mf_user");
                    while ($row = $st->fetch()) {
                        $id = htmlspecialchars($row['id']);
                        $name = htmlspecialchars($row['name']);
                        echo "<option value='$id'>$name</option>";
                        $number++;
                    }
                    ?>
                    </select>
                </labe><br />
                <label>開始日:<input type="date" name="str_day" min="2015-10-01" required></label><br />
                <label>終了日:<input type="date" name="end_day" min="2015-10-01" required></label><br />
                <button type="submit">ダウンロード</button>
            </form>
        </section>
        
        <section id="info">
            <h2>インフォメーション</h2>
            <p>現在の登録ユーザー数は<?= $number ?>人です．</p>
        </section>
        
        <section>
            <h2>新規ユーザー登録</h2>
            <form method="post" action="signin.php">
                <div class="form-group">
                     <label class="sr-only" for="exampleinputformat">ユーザーネーム:</label>
                     <input type="text" class="form-control" name="username" placeholder="User Name" required>
                </div>
                <div class="form-group">
                     <label class="sr-only" for="exampleInputPassword2">パスワード:</label>
                     <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-block" onClick="return check('新しいユーザーを登録します．本当によろしいですか？')">登録</button>
                </div>
            </form>
        </section>
        
        <section>
            <h2>ユーザー削除</h2>
            <form method="post" action="user_delete.php">
                <labe>ユーザー:
                    <select name="del_user">
                    <?php
                        
                    $st1 = $pdo->query("SELECT * FROM mf_user WHERE NOT id = 1");
                    while ($row = $st1->fetch()) {
                        $id = htmlspecialchars($row['id']);
                        $name = htmlspecialchars($row['name']);
                        echo "<option value='$id'>$name</option>";
                        
                    }
                    ?>
                    </select>
                </labe>
                <button type="submit" onClick="return check('選択ユーザーの全データが削除されます．本当によろしいですか？\n※元には戻せません．')">削除</button>
            </form>
        </section>
        
        <a href="logout.php"><i class="fa fa-sign-out"></i>ログアウト</a>
    </body>
</html>



























