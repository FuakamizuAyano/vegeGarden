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
<body style="background-color:#FFFFF0;text-align:center;">
<div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>商品一覧</h1>
    </div>
    <br>

   <?php
   try{
    $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();

    $dbh = null;

    echo '<form method="post" action="pro_branch.php">';

    while(true){
        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        if($rec == false){
            break;
        }
        echo '<input type="radio" name="procode" value="'.$rec['code'].'">';
        echo $rec['name'].'---';
        echo $rec['price'].'円';
        echo '<br>';
    }
    echo '<br>';
    echo '<input type="submit" name="disp" value="参照">';
    echo '<input type="submit" name="add" value="追加">';
    echo '<input type="submit" name="edit" value="修正">';
    echo '<input type="submit" name="delete" value="削除">';
    echo '</form>';
   }
   catch(Exception $e){
    echo "ただいま障害により大変ご迷惑をお掛けしております。";
    exit();
   }
   ?> 

   <br>
   <a href="../staff_login/staff_top.php">トップメニューへ</a>
</body>
</html>