<!-- セッション使用 -->
<?php session_start(); ?>
<?php require 'home.php';?>
<?php
unset($_SESSION['customer']);
// ログイン名、パスワードの判定
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$sql = $pdo->prepare('SELECT * FROM customer where login=? AND password=? ');
$sql->execute([$_REQUEST['login'],$_REQUEST['password']]);

// セッションデータの登録
foreach($sql->fetchAll() as $row){
    $_SESSION['customer']=[
        'id'=>$row['id'],
        'name'=>$row['name'],
        'address'=>$row['address'],
        'email'=>$row['email'],
        'login'=>$row['login'],
        'password'=>$row['password']];
}

//ログイン判定
if(isset($_SESSION['customer'])){
    echo 'こんにちは、',$_SESSION['customer']['name'],'様';
}else{
    echo 'ログイン名またはパスワードが違います';
}
?>





