<?php session_start();?>
<?php require 'home.php';?>

<?php
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
if(isset($_SESSION['customer'])){
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('SELECT * FROM customer WHERE id!=? AND login=?');
    $sql->execute([$id,$_REQUEST['login']]);    
}else{
    $sql=$pdo->prepare('SELECT * FROM customer WHERE login=?');
    $sql->execute([$_REQUEST['login']]);      
}
if(empty($sql->fetchALL())){
    //ログインしている場合の処理（UPDATE）
    if(isset($_SESSION['customer'])){
        $sql=$pdo->prepare('UPDATE　customer set name=?, address=?, email=?, '. 'login=? password=? WHERE id = ?');
        $sql->execute([
        $_REQUEST['name'],$_REQUEST['address'],$_REQUEST['email'],$_REQUEST['login'],$_REQUEST['password'],$id]);
        $_SESSION['customer']=[
            'id'=>$id,'name'=>$_REQUEST['name'], 'address'=>$_REQUEST['address'], 
            'email'=>$_REQUEST['email'],'login'=>$_REQUEST['login'],'password'=>$_REQUEST['password']];
        echo 'お客様情報を更新しました';
    }else{
        //ログインしていない場合の処理（INSERT）
        $sql=$pdo->prepare('INSERT INTO customer VALUES(null,?,?,?,?,?)');
        $sql->execute([
            $_REQUEST['name'],$_REQUEST['address'],$_REQUEST['email'],$_REQUEST['login'],$_REQUEST['password']]);
        echo 'お客様情報を登録しました';
    }
    }else{
        //ログイン名がすでに登録済みの場合
        echo 'お客様の入力したログイン名はすでに使用されております。<br>ログイン名の変更をおねがいいたします。';
    }
?>
