<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>SQLインジェクション対策(プリペアドステートメント)</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';
# ☆レシピ260☆（データベースに接続したい）のデータベース接続設定を読み込みます。
require_once __DIR__ . '/../../../../conf/database_conf.php';

if (count($_POST) == 0) {
  echo <<<EOL
<form method="post" action="prepared_statement.php">
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

# クエリを準備します。
  $sql = 'SELECT * FROM user WHERE user=? AND password=?';

  $msg = '認証NG';
  if ($stmt = mysqli_prepare($link, $sql)) {
# 準備したクエリに変数をバインドします。第2引数は、変数の型が2つとも
# 文字列（s）であることを指定しています。
    mysqli_stmt_bind_param($stmt, 'ss', $_POST['id'], $_POST['password']);
# クエリを実行します。
    mysqli_stmt_execute($stmt);
# クエリの結果を転送します。
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
# クエリを閉じます。
    mysqli_stmt_close($stmt);
    if ($count == 1) {
      $msg = '認証OK';
    }
  }
  echo h($msg);
}
?>
</div>
</body>
</html>
