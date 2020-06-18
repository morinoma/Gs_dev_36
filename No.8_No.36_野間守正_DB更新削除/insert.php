<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// $id = $_POST["id"];
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$indate = $_POST["indate"];


//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,bookname,bookurl,comment,indate)VALUES(NULL,:a1,:a2,:a3,:a4,sysdate())");
$stmt->bindValue(':a1',$bookname, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3',$comment, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4',$indate, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．bm_list_view.phpへリダイレクト
  header('Location: index.php');

}
?>
