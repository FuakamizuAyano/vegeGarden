<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>会員ログイン</h1>
    </div>
    <br>
    <?php
    try{
        $member_email = $_POST['email'];
        $member_pass = $_POST['pass'];

        //$member_pass = md5($member_pass);

        $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code,name FROM dat_member WHERE email=? AND password=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $member_email;
        $data[] = $member_pass;

        echo $member_email;
        echo $member_pass;

        $stmt -> execute($data);

        $dbh = null;

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($rec == false){
            echo 'メールアドレスかパスワードが間違っています。';
            echo '<a href="member_login.php">戻る</a>';
        }else{
            session_start();
            $_SESSION['member_login'] = 1;
            $_SESSION['member_code'] = $rec['code'];
            $_SESSION['member_name'] = $rec['name'];
            header('Location:shop_list.php');
            exit();
        }
    }
    catch(Exception $e){
        echo $e;
        echo 'ただいま障害により大変なご迷惑をお掛けしております。';
        exit();
    }
    ?>
</body>
</html>
