<?php require 'kanri.php'?>

<p>商品を追加します</p>
<form method="POST" action="syouhin_touroku_output.php" enctype="multipart/form-data">
商品名<input type = "text" name = "name">
価格<input type = "text" name = "price">
画像<input type = "file"  name="upfile">
<input type = "submit" value = "追加する">
</form>
