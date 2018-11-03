<?php session_start(); ?>
<?php require 'home.php';?>

<?php
if(isset($_SESSION['customer'])){
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    $sql=$pdo->prepare('INSERT INTO favorite VALUES(?,?)');
    $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
    echo 'お気に入りに商品を追加しました。';
    echo '<hr>';
    require 'favorite.php';
}else{
    echo 'お気に入りに商品を追加するには,ログインしてください';
}
?>
