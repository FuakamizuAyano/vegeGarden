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
try{
    $staff_code = $_POST['code'];
    $staff_pass = $_POST['pass'];

    // $staff_code = htmlspecialchars($staff_code, ENT_QUOTES, 'UTF-8');
    // $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

    // $staff_pass = password_hash($staff_pass, PASSWORD_DEFAULT);  

    $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = 'SELECT password FROM mst_staff WHERE code=?';
    // $stmt = $dbh -> prepare($sql);
    // $data = array($staff_code);
    // 配列を無理やりstringしようとしたからエラーが出てた。

    $sql = 'SELECT name FROM mst_staff WHERE code=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $data[] = $staff_pass;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    if($rec == false){
        echo 'スタッフコードかパスワードが間違っています。';
        // echo '結果:'.$rec;
        // echo 'データ:'.$data;
        echo '<a href="staff_login.php">戻る</a>';
    }else{
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $staff_code;
        header('Location:staff_top.php');
        exit();
    }
}
catch(Exception $e){
    echo 'ただいま障害により大変なご迷惑をお掛けしております。';
    exit();
}
?>

</body>
</html>