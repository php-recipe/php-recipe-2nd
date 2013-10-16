<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>レコードを更新したい</title>
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

# 更新前のレコードをすべて表示します。
  echo '更新前のレコード一覧<br>';
  show_all_record($db);

# 更新用のSQL文を書いて、プリペアドステートメントを準備します。
  $sql = 'UPDATE example SET language = :language WHERE id = :id';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', 1, PDO::PARAM_INT);
  $prepare->bindValue(':language', 'PHP5.4', PDO::PARAM_STR);
  $prepare->execute();

# 更新後のレコードをすべて表示します。
  echo '更新後のレコード一覧<br>';
  show_all_record($db);
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}

# exampleテーブルの中身をすべて表示する☆レシピ261☆（複数のレコードを取得したい）関数です。
function show_all_record($db)
{
  $sql = 'SELECT * FROM example';
  $prepare = $db->prepare($sql);
  $prepare->execute();
  $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result as $row) {
    echo 'ID: ' . h($row['id']) . ' language: ' . h($row['language']) . '<br>';
  }
}
?>
</div>
</body>
</html>
