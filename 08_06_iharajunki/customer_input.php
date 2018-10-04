<?php session_start();?>
<?php require 'home.php';?>
<div id = "center">
<?php
//登録済み情報確認・表示
$name=$address=$email=$login=$password='';
if(isset($_SESSION['customer'])){
    $name=$_SESSION['customer']['name'];
    $address=$_SESSION['customer']['address'];
    $email=$_SESSION['customer']['email'];
    $login=$_SESSION['customer']['login'];
    $password=$_SESSION['customer']['password'];    
}
//入力画面作成
echo '<form action = "customer_output.php" method = "POST">';
echo '<table>';
echo '<tr><td>お名前</td><td>';
echo '<input type = "text" name = "name"  class = "box" value = "',$name,'"> ';
echo '</td><tr>';
echo '<tr><td>ご住所</td><td>';
echo '<input type = "text" name = "address" class = "box"  value = "',$address,'"> ';
echo '</td><tr>';
echo '<tr><td>メールアドレス</td><td>';
echo '<input type = "text" name = "email" class = "box"  value = "',$email,'"> ';
echo '</td><tr>';
echo '<tr><td>ログイン名</td><td>';
echo '<input type = "text" name = "login" class = "box"  value = "',$login,'"> ';
echo '</td><tr>';
echo '<tr><td>パスワード</td><td>';
echo '<input type = "password" name = "password" class = "box"  value = "',$password,'"> ';
echo '</td><tr>';
echo '</table>';
//確定ボタン
echo '<input type = "submit" id = "submit" value = "確定">';
echo '</form>';
?>
</div>



