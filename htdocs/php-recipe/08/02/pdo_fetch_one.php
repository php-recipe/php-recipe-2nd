<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>1行だけレコードを取得したい</title>
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

# SQL文を準備します。
  $sql = 'SELECT * FROM example WHERE id = :id OR language = :language '
    . 'ORDER BY id LIMIT 1';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', 1, PDO::PARAM_INT);
  $prepare->bindValue(':language', 'Ruby', PDO::PARAM_STR);
  $prepare->execute();
# 結果をカラム名をキーとした連想配列で取得します。
  $result = $prepare->fetch(PDO::FETCH_ASSOC);

# 結果を出力します。
  echo '<pre>';
  echo "連想配列で取得した場合\n";
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
