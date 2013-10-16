<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>複数のレコードを取得したい</title>
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

# SQL文を準備します。「:id」「:language」がプレースホルダです。
  $sql = 'SELECT * FROM example WHERE id = :id OR language = :language';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', 1, PDO::PARAM_INT);
  $prepare->bindValue(':language', 'Ruby', PDO::PARAM_STR);
  $prepare->execute();

  echo '<pre>';
# クエリ結果を数値添え字配列で取得します。
  $result = $prepare->fetchAll(PDO::FETCH_NUM);
  echo "数値添え字配列で取得した場合\n";
  print_r(h($result));
  echo "\n";

# 再度クエリを実行し、結果をカラム名をキーとした連想配列で取得します。
  $prepare->execute();
  $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
  echo "カラム名をキーとした連想配列で取得した場合\n";
  print_r(h($result));
  echo "\n";

# 再度クエリを実行し、クエリ結果を数値添え字、カラム名両方の配列で取得します。
  $prepare->execute();
  echo "数値添え字、カラム名両方の配列で取得した場合。\n";
  $result = $prepare->fetchAll(PDO::FETCH_BOTH);
  print_r(h($result));
  echo '</pre>';
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}

function h($var)  // HTMLでのエスケープ処理をする関数
{
  if (is_array($var)) {
    return array_map('h', $var);
  } else {
    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
  }
}
?>
</div>
</body>
</html>
