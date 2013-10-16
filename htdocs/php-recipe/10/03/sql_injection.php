<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>SQLインジェクション</title>
</head>
<body>
<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';
# ☆レシピ260☆（データベースに接続したい）のデータベース接続設定を読み込みます。
require_once __DIR__ . '/../../../../conf/database_conf.php';

if (count($_POST) == 0) {
  echo <<<EOL
<form method="post" action="sql_injection.php">
ユーザー名: <input name="id"><br>
パスワード: <input name="password"><br>
<input type="submit" value="ログイン">
</form>
EOL;
} else {
  if (! $link = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName)) {
    die('データベースエラー');
  }
  // 文字エンコードの指定
  elseif (! mysqli_set_charset($link, 'utf8')) {
    die('データベースエラー');
  }

  $sql = sprintf("SELECT * FROM user WHERE user = '%s' AND password = '%s'",
                 $_POST['id'], $_POST['password']);
  echo h($sql) . '<br>';  // デバッグ用にSQL文を表示

  $msg = '認証NG';
  if ($result = mysqli_query($link, $sql)) {
    $count = mysqli_num_rows($result);
    if ($count == 1) {
      $msg = '認証OK';
    } 
  }
  echo h($msg);
}
?>
</body>
</html>
