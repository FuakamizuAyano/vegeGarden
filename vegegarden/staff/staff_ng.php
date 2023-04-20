<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
<div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ一覧</h1>
    </div>

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
    echo 'ログインされていません<br>';
    echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}
?>

  <p>スタッフが選択されていません。</p>
  <a href="staff_list.php">戻る</a>  
</body>
</html>