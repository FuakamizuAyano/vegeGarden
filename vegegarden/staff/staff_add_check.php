<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>スタッフ追加確認</h1>
    </div>
<br>
    <?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false){
        echo 'ログインされていません<br>';
        echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
        exit();
    }

    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass2 = $_POST['pass2'];

    // 特殊文字のエスケープ、特殊文字ではない、文字列であることをパソコンに伝えている
    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
    $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

    if($staff_name == ''){
        echo 'スタッフ名が入力されていません。<br>';
    }else{
        echo 'スタッフ名:  ';
        echo $staff_name;
        echo '<br>';
    }

    if($staff_pass == ''){
        echo 'パスワードが入力されていません。<br>';
    }

    if($staff_pass2 == ''){
        echo 'パスワードが一致しません。<br>';
    }

    if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2){
        echo '<form>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    }else{
        $staff_pass_hash = password_hash($staff_pass, PASSWORD_DEFAULT);
        echo '<form method="post" action="staff_add_done.php">';
        echo '<input type="hidden" name="name" value="'.$staff_name.'">';
        echo '<input type="hidden" name="pass" value="'.$staff_pass_hash.'">';
        echo '<br>';
        echo '<input type="button" onclick="history back()" value="戻る">';
        echo '<input type="submit" name="sample" value="OK">';
        echo '</form>';
    }
    ?>

</body>
</html>