<?php
//1.POSTでデータを取得
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$indate = $_POST["indate"]
$id = $POST["id"];

//2.DB接続など
require "funcs.php";
$pdo = db_conect();


//3.UPDATE gs_bm_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れと同じです。
$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookname=:a1, bookurl=:a2, comment=:a3, indate=:a4, WHERE id=:id");
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $indate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false) {
    //SQLエラー関数
   sql_error($stmt);
  }else{

   //一覧ページへ戻す
   redirect('select.php');
  }
?>