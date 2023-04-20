<?php
session_start();
$_SESSION = array();
if(isset($COOKIE[session_name()]) == true){
    setcookie(session_name(),'',time()-4000,'/');
}
session_destroy();
?>

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
   <p>ログアウトしました。</p>
   <br>
   <a href="../staff_login/staff_login.php">ログイン画面へ</a> 
</body>
</html>