<?php
if(!empty($_SESSION['syouhin'])){
    echo '<table>';
    echo '<th>商品番号</th><th>商品名</th>';
    echo '<th>価格</th><th>個数</th>';
    $total=0;
    //カート内の商品一覧を表示
    foreach($_SESSION['syouhin'] as $id=>$syouhin){
        echo '<tr>';
        echo '<td>', $id, '</td>' ;
        echo '<td><a href = "detail.php"$id=', $id, '">',$syouhin['name'], '</a></td>';
        echo '<td>',  $syouhin['price'], '</td>';
        echo '<td>',  $syouhin['count'], '</td>';
        $subtotal = $syouhin['price']*$syouhin['count'];
        $total+=$subtotal;
        echo '<td><a href = "cart_delete.php?id=', $id, '">カートから削除する</a></td>';
        echo '</tr>';
    }
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>',$total,'</td><td></td></tr>';
    echo '</table>';
}else{
    echo 'カートに商品がありません';
}
?>
<div