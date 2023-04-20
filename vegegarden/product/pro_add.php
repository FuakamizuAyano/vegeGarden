<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
    echo 'ログインされていません<br>';
    echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>商品追加</h1>
    </div>

<body style="background-color:#FFFFF0;text-align:center;">

<form method="post" action="pro_add_check.php" enctype="multipart/form-data">
    <p>商品名を入力してください。<br></p>
    <input type="text" name="name" style="width:200px"><br>
    <p>価格を入力してください。<br></p>
    <input type="text" name="price" style="width:50px"><br>
    <p>画像を選んでください。</p>
    <input type="file" name="gazou" style="width:400px">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form> 
</body>
</html>