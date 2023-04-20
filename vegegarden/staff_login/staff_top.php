<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
<div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>ショップ管理トップメニュー</h1>
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

   <br>
   <a href="../staff/staff_list.php">スタッフ管理</a>
   <br>
   <a href="../product/pro_list.php">商品管理</a> 
   <br>
   <a href="../order/order_download.php">注文ダウンロード</a>
   <br>
   <a href="staff_logout.php">ログアウト</a>
</body>
</html>