<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>テーブルを作成したい</title>
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

# SQL文を書き、クエリを実行してテーブルを作成します。（MySQL用）
  $sql = <<<SQL
CREATE TABLE IF NOT EXISTS example2 (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  data VARCHAR(255) NOT NULL
) DEFAULT CHARSET=utf8
SQL;
# SQLiteでは、SQL文は以下のようになります。
//  $sql = <<<SQL
//CREATE TABLE IF NOT EXISTS example2 (
//  id INTEGER PRIMARY KEY AUTOINCREMENT,
//  data VARCHAR(255) NOT NULL
//)
//SQL;

  $db->query($sql);
  echo 'テーブルを作成しました。';

# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}
?>
</div>
</body>
</html>
