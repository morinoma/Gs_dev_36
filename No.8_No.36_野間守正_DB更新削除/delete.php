<?php
//1. GETでidを取得
$id = $_GET["id"];

//2. DB接続します
require "funcs.php";
$pdo = db_conect();


//3. データ削除SQLを準備
$delete = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$delete->bindvalue(":id","$id",PDO::PARAM_INT);//PARAM_STR


//4. SQL実行
$status = $delete->execute();

//5. 一覧ページへ戻す
if ($status == false) { 
    //SQLエラー関数
    sql_error($delete);

  }else{
    redirect('select.php');
  }

?>