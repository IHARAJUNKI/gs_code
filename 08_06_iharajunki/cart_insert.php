<?php session_start();?>
<?php require 'home.php';?>

<?php
$id = $_REQUEST['id'];
//初期化
if(!isset($_SESSION['syouhin'])){
    $_SESSION['syouhin']=[];
}
//カートに入っている個数を取得
$count=0;
if(isset($_SESSION['syouhin'][$id])){
    $count=$_SESSION['syouhin'][$id]['count'];
}
//カートに商品を登録
$_SESSION['syouhin'][$id]=[
    'name'=>$_REQUEST['name'],
    'price'=>$_REQUEST['price'],
    'count'=>$_REQUEST['count']
];
echo '<p>カートに商品を追加しました<p>';
echo '<hr>';
require 'cart.php';
?>
