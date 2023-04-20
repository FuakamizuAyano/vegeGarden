<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ追加</h1>
    </div>
<br>
<?php
// サーバー側に一時的なデータを保存するために使用される仕組み
// セッション開始宣言
session_start();

// PHPのセッションIDを作成する関数
// 引数にtrueを指定することで、セッションデータを保持したまま新しいセッションIDを生成することができる
session_regenerate_id(true);


if(isset($_SESSION['login']) == false){
    echo 'ログインされていません<br>';
    echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}
?>

<form method="post" action="staff_add_check.php">
    <p>スタッフ名を入力してください。<br></p>
    <input type="text" name="name" style="width:200px"><br>
    <p>パスワードを入力してください。<br></p>
    <input type="password" name="pass" style="width:100px"><br>
    <p>パスワードをもう一度入力してください。<br></p>
    <input type="password" name="pass2" style="width:100px"><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
</body>
</html>