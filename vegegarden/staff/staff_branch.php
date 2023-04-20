<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>べジ農園</title>
</head>
<body style="background-color:#FFFFF0;text-align:center;">
    <div style="border-style:solid;font-family:'Hiragino Mincho ProN','ＭＳ 明朝',serif;">
        <h1>ログイン確認</h1>
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

// スタッフコードがセットされていなかったら
if(isset($_POST['disp']) == true){
   if(isset($_POST['staffcode']) == false){
    header('Location:staff_ng.php');
    exit();
   }
//    スタッフコードの値もstaff_disp.phpへ一緒に飛ぶ
   $staff_code = $_POST['staffcode'];
   header('Location:staff_disp.php?staffcode='.$staff_code);
   exit();
}

if(isset($_POST['add']) == true){
    header('Location:staff_add.php');
    exit();
}

// edit: 編集
if(isset($_POST['edit']) == true){
    if(isset($_POST['staffcode']) == false){
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code = $_POST['staffcode'];
   header('Location:staff_edit.php?staffcode='.$staff_code);
   exit();
}

if(isset($_POST['delete']) == true){
    if(isset($_POST['staffcode']) == false){
        header('Location:staff_ng.php');
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_delete.php?staffcode='.$staff_code);
    exit();
}
?>

</body>
</html>