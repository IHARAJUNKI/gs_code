<?php
if(isset($_SESSION['customer'])){
    echo '<table>';
    echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    $sql=$pdo->prepare('SELECT * FROM favorite,syouhin '.
                      'where customer_id=? and syouhin_id=syouhin.id');
    $sql->execute([$_SESSION['customer']['id']]);
    foreach($sql as $row){
        $id = $row['id'];
        echo '<tr>';
        echo '<td>',$id,'</td>';
        echo '<td><a href = "detail.php?id='.$id.'">',$row['name'],'</a></td>';
        echo '<td>',$row['price'],'</td>';
        echo '<td><a href = "favorite_detail.php?id=',$id,'">削除</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    }else{
        echo 'お気に入りに商品を追加するには、ログインしてください';
    }
?>