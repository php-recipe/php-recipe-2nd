<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>レコードを削除したい</title>
</head>
<body>
<div>
<?php
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../../../../conf/database_conf.php';

try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
  $db = new PDO($dsn, $dbUser, $dbPass);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# 削除前のレコードをすべて表示します。
  echo '削除前のレコード一覧<br>';
  show_all_record($db);

# 削除用のSQL文を書いて、プリペアドステートメントを準備します。
  $sql = 'DELETE FROM example WHERE id = :id';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', 5, PDO::PARAM_INT);
  $result = $prepare->execute();

# 削除後のレコードをすべて表示します。
  echo '削除後のレコード一覧<br>';
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

function h($string) // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
