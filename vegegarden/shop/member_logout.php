<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>ログアウト</h1>
    </div>
    <br>

    <?php
session_start();
$_SESSION = array();
if(isset($COOKIE[session_name()]) == true){
    setcookie(session_name(),'',time()-4000,'/');
}
session_destroy();
?>
   <p>ログアウトしました。</p>
   <br>
   <a href="shop_list.php">商品一覧へ</a> 
</body>
</html>