<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
    echo 'ログインされていません<br>';
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   <title>べジ農園</title>
</head>
<body>
  <p>商品が選択されていません。</p>
  <a href="pro_list.php">戻る</a>  
</body>
</html>