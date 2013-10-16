<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>クエリ結果のメモリを解放したい</title>
</head>
<body>
<div>
<?php
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../../../../conf/database_conf.php';
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます。
require_once __DIR__ . '/../../../../lib/h.php';

try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
  $db = new PDO($dsn, $dbUser, $dbPass);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# SQL文を書いてプリペアドステートメントを準備し、クエリを実行します。
  $sql = 'SELECT * FROM example';
  $prepare = $db->prepare($sql);
  $prepare->execute();

  echo '<pre>';
# クエリ結果を連想配列で取得し、表示します。
  $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
  print_r(h($result));
  echo '</pre>';
# クエリ結果を保持した状態の使用メモリを表示します。
  echo '<p>解放前のメモリ使用量は ' . memory_get_usage() . ' バイトです。<br>';

# メモリを解放します。
  unset($prepare);

# クエリ結果を解放した後の使用メモリを表示します。
  echo '解放後のメモリ使用量は ' . memory_get_usage() . ' バイトです。</p>';
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}
?>
</div>
</body>
</html>
