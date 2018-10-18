<?php session_start();?>
<?php require 'home.php';?>

<?php
//ログインしていない場合
if(!isset($_SESSION['customer'])){
    echo '購入手続きを行うにはログインしてください';    
}else//ログイン済みの場合(カートに商品なし)
    if(empty($_SESSION['syouhin'])){
        echo 'カートに商品がありません';
}else{//カートに商品がある場合
    echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
    echo '<p>ご住所:', $_SESSION['customer']['address'], '</p>';
    echo '<p>メールアドレス：', $_SESSION['customer']['email'], '</p>';
    echo '<hr>';
    require 'cart.php';
    echo '</hr>';
    echo '<p>ご内容を確認いただき、購入を確定してください</p>';
    echo '<a href = "purchase_output.php">購入を確定する</a>';
}
?>