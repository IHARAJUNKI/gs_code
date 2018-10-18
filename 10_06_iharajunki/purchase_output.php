<?php session_start();?>
<?php require 'home.php';?>

<?php
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$purchase_id=1;
foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id=$row['max(id)']+1;
}
$sql=$pdo->prepare('insert into purchase values(?,?)');
if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	foreach ($_SESSION['syouhin'] as $syouhin_id=>$syouhin) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $syouhin_id, $syouhin['count']]);
	}
	unset($_SESSION['syouhin']);
	echo '購入手続きが完了しました。ありがとうございます。';
} else {
	echo '購入手続き中にエラーが発生しました。申し訳ございません。';
}
?>
