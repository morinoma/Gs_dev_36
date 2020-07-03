<?php
session_start();
$message = '';

if (isset($_POST['loginId']) && isset($_POST['loginPassword']))
{
  //ログイン処理
  if ($_POST['loginId'] === 'user' && $_POST['loginPassword'] === 'pass')
  {
    $_SESSION['loginId'] = $_POST['loginId'];
    $_SESSION['loginPassword'] = $_POST['loginPassword'];
    header("Location: active.php");
  }
  else {
    $message = 'ID、パスワードが不正です';
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログインサンプル</title>
</head>
<body>
<form method="post" action="index.php">
  <input type="text" name="loginId">
  <input type="password" name="loginPassword">
  <input type="submit" value="ログイン">
  <div><?php echo $message; ?></div>
</form>
</body>
</html>