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
<body>
   <p>カートを空にしました。</p>
   
</body>
</html>