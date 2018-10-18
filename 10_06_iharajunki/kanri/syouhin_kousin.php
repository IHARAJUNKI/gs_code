<?php require "kanri.php" ?>
<link rel = "stylesheet" href = "style.css">
<div class = "th0">商品番号</div>
<div class = "th1">商品名</div>
<div class = "th1">価格</div>

<?php
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
foreach($pdo->query('select * from syouhin') as $row){
    echo '<form action = "syouhininput_kousin_output.php" method = "POST">';
    echo '<input type = "hidden" name = "id" value = "' ,$row['id'],'">';
    echo '<div class = "td0">',$row['id'],'</div>';
    echo '<div class = "td1">';
    echo '<input type = "text" name = "name" value = "' ,$row['name'],'">';
    echo '</div>';
    echo '<div class = "td1">';
    echo '<input type = "text" name = "price" value = "' ,$row['price'],'">';
    echo '</div>';
    echo '<div class = "td2"><input type = "submit" value = "更新"></div>';
    echo '</form>';
}
?>