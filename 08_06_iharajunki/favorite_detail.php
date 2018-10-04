<?php session_start();?>
<?php require 'home.php';?>

<?php
if(isset($_SESSION['customer'])){
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    $sql=$pdo->prepare('DELETE FROM favorite WHERE customer_id=? AND syouhin_id=?');
    $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id']]);
    echo 'お気に入りから削除しました';
    echo '<hr>';
}else{
    echo 'お気に入りから削除するには、ログインしてください';
}
?>