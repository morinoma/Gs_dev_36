<?php
session_start();
    = $_POST["lid"];
    = $_POST["lpw"];

    // 接続

    try{
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
        catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
        }

        // データ登録SQL作成
        $sql = "SELECT * FROM gs_user_table WHERE u_id=:"
        $stmt = $pdo->prepare("sql");
        $stmt->bindValue(':lid',$lid);    //Integer（数値の場合 PDO::PARAM_INT)
        $stmt->bindValue(':lpw',$lpw);  //Integer（数値の場合 PDO::PARAM_INT)
        $status = $stmt->execute();
        
        // 抽出データ数を取得
        $val = $stmt ->fetch();

        // 該当レコードがあればSESSIONに値を代入



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
        

    }