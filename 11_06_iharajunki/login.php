<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require 'home.php';?>
<form action = "loguin_output.php" method = "POST">
<div>
<span>WELCOME TO HOMES STORE</span> 
<p id = "log">ログイン名</p><input type = "text" id = "login" name = "login"><br>
<p>パスワード</p><input type = "password" id = "password" name = "password">
</div>
<input type="submit" id = "submit" value = "ログイン"><br>
</form>   
</body>
</html>