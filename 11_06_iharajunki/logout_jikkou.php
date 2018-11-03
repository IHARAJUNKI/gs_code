<?php session_start();?>
<?php require 'home.php';?>
<?php
if(isset($_SESSION['customer'])){
unset($_SESSION['customer']);
echo 'ログアウトしました';
}else{
    echo '現在ログインしていません';
}
?>