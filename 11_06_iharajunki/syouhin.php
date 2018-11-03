<?php require 'home.php';?>
<!-- 商品検索 -->
<form action "syouhin.php" method="POST">
商品検索
<input type = "text" name = "keyword">
<input type = "submit" value = "検索">
</form>
<hr>

<?php
echo '<table>';
echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
//商品検索実行
if(isset($_REQUEST['keyword'])){
    $sql = $pdo->prepare('SELECT * FROM syouhin WHERE name like ? ');
    $sql->execute(['%'.$_REQUEST['keyword'].'%']);
}else{
    //商品一覧表示
    $sql = $pdo->prepare('SELECT * FROM syouhin');
    $sql->execute([]);
}
foreach($sql as $row){
    //商品番号
    $id = $row['id'];
    echo '<tr>';
    echo '<td>',$id,'</td>';
    //商品名（選択すると詳細画面へ移行）
    echo '<td>';
    echo '<a href = "detail.php?id=',$id,'">',$row['name'],'</a>';
    echo '</td>';
    //価格
    echo '<td>';
    echo '<td>',$row['price'],'</td>';
    echo '</tr>';
}
 echo '</table>';
 ?>