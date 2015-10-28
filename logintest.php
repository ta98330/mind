<?php
define("PASSWORD", "pass");
$message = "";
 
session_start();
 
/*クッキーの存在確認
if(isset($_COOKIE["TEST_COOKIE"]) && $_COOKIE["TEST_COOKIE"] === md5(PASSWORD)){
     
    $_SESSION["TEST"] = $_COOKIE["TEST_COOKIE"];
    header("Location:admin.php");
     
}*/
 
if(isset($_POST["action"])&&$_POST["action"]==="login"){
    if(PASSWORD === $_POST["password"]){//パスワード確認
         
        $_SESSION["TEST"] = md5(PASSWORD);//暗号化してセッションに保存
         
        if(isset($_POST["memory"]) && $_POST["memory"]==="true"){//次回からは自動的にログイン
            setcookie("TEST_COOKIE", $_SESSION["TEST"], time()+3600*24*14);//暗号化してクッキーに保存
        }
         
        header("Location:admin.php");
         
    }else{
        session_destroy();//セッション破棄
        $message = "パスワードが違います";
    }
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<?php
    if($message!=""){
        print "<p class=\"message\">".$message."</p>\n";
    }
?>
<form action="" method="post">
<p><input name="password" type="text" value="pass" /><input name="action" type="submit" value="login" /></p>
<p><label><input type="checkbox" name="memory" value="true" />次回からは自動的にログイン</label></p>
</form>
</body>
</html>