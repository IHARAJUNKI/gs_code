<?php require 'home.php';?>

<?php
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$sql = $pdo->prepare('SELECT * FROM syouhin WHERE id =?');
$sql->execute([$_REQUEST['id']]);
foreach($sql as $row){
    echo '<p><img src = "image/',$row['id'],'.jpg"></p>';
    echo '<form action = "cart_insert.php" method = "POST">';
    echo '<p>商品番号：',$row['id'],'</p>';
    echo '<p>商品名：',$row['name'],'</p>';
    echo '<p>価格：',$row['price'],'</p>';
    echo '<p>個数：<select name="count">';
    for ($i=1; $i<=10; $i++){
        echo '<option value ="', $i, '">', $i, '</option>';
    }
    echo '</select></p>';
    echo '<input type = "hidden" name = "id" value = "',$row['id'],'">';
    echo '<input type = "hidden" name = "name" value = "',$row['name'],'">';
    echo '<input type = "hidden" name = "price" value = "',$row['price'],'">';
    echo '<p><input type = "submit" value = "カートに入れる"></p>';
    echo '</form>';
    echo '<p><a href = "favorite_insert.php?id=',$row['id'],'">お気に入りに追加</a></p>';
}
?>