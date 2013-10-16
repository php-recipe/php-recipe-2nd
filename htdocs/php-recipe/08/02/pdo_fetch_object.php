<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>レコードをオブジェクトとして取得したい</title>
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
  $sql = 'SELECT * FROM example WHERE id = :id OR language = :language';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', 1, PDO::PARAM_INT);
  $prepare->bindValue(':language', 'Ruby', PDO::PARAM_STR);
  $prepare->execute();
# 結果をstdClassのオブジェクト配列として取得します。
  $result = $prepare->fetchAll(PDO::FETCH_OBJ);

# 結果を出力します。
  foreach ($result as $row) {
    echo 'クラス名: ' . get_class($row) . '<br>';
    echo h("id: {$row->id}, language: {$row->language}") . "<br>";
  }

# 再度クエリを実行し、結果をRecordクラスのオブジェクト配列で取得します。
  $prepare->execute();
  $result = $prepare->fetchAll(PDO::FETCH_CLASS, 'Record');

# 結果を出力します。
  foreach ($result as $row) {
    echo 'クラス名: ' . get_class($row) . '<br>';
    echo h($row->stringify()) . '<br>';
  }
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}

# レコードのデータを入れるひな形のクラス☆レシピ154☆（クラスを使いたい）を定義します。
class Record
{
  public $id;
  public $language;

# オブジェクトのプロパティを読みやすい文字列表現に変換するメソッドです。
  public function stringify()
  {
    return "レコードID: {$this->id}, 言語: {$this->language}";
  }
}

function h($string)  // HTMLでのエスケープ処理をする関数
{
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
</div>
</body>
</html>
