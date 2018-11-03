<?php require "kanri.php"?>
<?php 
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$sql = $pdo->prepare('insert into syouhin values (null,?,?)');
if($sql->execute([$_REQUEST['name'],$_REQUEST['price']])){
    echo '商品を追加しました';
}else{
    echo '商品を追加できませんでした';
}
?>
