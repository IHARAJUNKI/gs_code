<?php require "kanri.php"?>
<?php
$name   = $_POST["name"];
$price  = $_POST["price"];

if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    //情報取得
    $file_name = $_FILES["upfile"]["name"];         
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; 
    $file_dir_path = "upload/";  //画像ファイル保管先
  
    //***File名の変更***
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
    $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
    $file_name = $file_dir_path.$uniq_name; //ユニークファイル名とパス
   
    $img="";  //画像表示orError文字を保持する変数
    // FileUpload [--Start--]
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_name ) ) {
            chmod( $file_name, 0644 );
        } else {
            exit("Error:アップロードできませんでした。"); //Error文字
        }
    }
    // FileUpload [--End--]
  }else{
    exit("画像が送信されていません"); //Error文字
  }

$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
$stmt  = $pdo->prepare("update syouhin set name =:a1, price =:a2, image =:image  where id = ?");
$stmt->bindValue(':a1', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $price,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);  //画像
$status = $stmt->execute();

if (empty($_REQUEST['name'])) {
	echo '商品名を入力してください。';
} else
if (!preg_match('/[0-9]+/', $_REQUEST['price'])) {
	echo '商品価格を整数で入力してください。';
} else
if ($status==false) {
	echo '更新に失敗しました。';
} else {
	echo '更新に成功しました。';
}
?>

