<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>データベースに登録済みかどうかチェックしたい</title>
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
  $sql = 'SELECT count(*) AS count FROM example WHERE language = :language';
  $prepare = $db->prepare($sql);

# 「PHP5.4」「PHP」がそれぞれ、データベースに登録済みかどうかチェックします。
  $languages = array('PHP5.4', 'PHP');
  foreach ($languages as $language) {
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
    $prepare->bindValue(':language', $language, PDO::PARAM_STR);
    $prepare->execute();
# 1列目のカラムの値を結果として取得します。
    $result = $prepare->fetchColumn();

# 結果を出力します。
    if ($result > 0) {
      echo '<p>「' . h($language) . '」はデータベースに登録済みです。</p>';
    } else {
      echo '<p>「' . h($language) . '」はデータベースに登録がありません。</p>';
    }
  }
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}

function h($var)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
