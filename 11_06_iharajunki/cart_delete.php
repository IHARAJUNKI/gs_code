<?php session_start();?>
<?php require 'home.php';?>

<?php
//カートから削除
unset($_SESSION['syouhin'][$_REQUEST['id']]);
echo 'カートから商品を削除しました';
echo '<hr>';
require 'cart.php';
?>
