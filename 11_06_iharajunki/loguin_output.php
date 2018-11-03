<!-- セッション使用 -->
<?php session_start(); ?>
<?php require 'home.php';?>
<?php
unset($_SESSION['customer']);
// ログイン名、パスワードの判定
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$sql = 'SELECT * FROM customer WHERE login=:login AND password=:password AND life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':login', $_POST["login"],PDO::PARAM_STR);
$stmt->bindValue(':password', $_POST["password"],PDO::PARAM_STR);
$res = $stmt->execute();

// セッションデータの登録
foreach($stmt->fetchAll() as $row){
    $_SESSION['customer']=[
        'id'=>$row['id'],
        'name'=>$row['name'],
        'address'=>$row['address'],
        'email'=>$row['email'],
        'login'=>$row['login'],
        'password'=>$row['password'],
        'kanri_flg'=>$row['kanri_flg'],
        'life_flg'=>$row['life_flg']];
}

//ログイン判定
if(isset($_SESSION['customer'])){
    echo '<p>';
    echo 'こんにちは、',$_SESSION['customer']['name'],'様';
    echo '</p>';
}else{
    echo 'ログイン名またはパスワードが違います';
}
?>
<?php if($_SESSION['customer']['kanri_flg']=="1"){ ?>
<a  href="kanri/kanri.php">管理画面へ</a>
<?php }?>  






