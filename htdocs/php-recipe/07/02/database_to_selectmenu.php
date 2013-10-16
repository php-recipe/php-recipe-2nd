<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>データベースからセレクトメニューを生成したい</title>
</head>
<body>
<div>
<form method="post" action="database_to_selectmenu.php">
<?php
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../../../../conf/database_conf.php';
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます。
require_once '../../../../lib/h.php';

try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
  $db = new PDO($dsn, $dbUser, $dbPass);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# SQL文を準備します。
  $sql = 'SELECT * FROM area ORDER BY id ASC';
  $prepare = $db->prepare($sql);
# クエリを実行します。
  $prepare->execute();
# クエリ結果をカラム名をキーとした連想配列で全行取得します☆レシピ261☆（複数のレコードを取得したい）。
  $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

  echo '<select name="area">' . "\n";
# 実行結果を連想配列で取得し、foreach構文で処理します。
  foreach ($result as $row) {
    echo '  <option value="' . h($row['id']) . '">' . h($row['area'])
         . '</option>' . "\n";
  }
  echo '</select>' . "\n";
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}

if (isset($_POST['area'])) {
  $id = (int) $_POST['area'];
  try {
# SQL文を準備します。
    $sql = 'SELECT * FROM area WHERE id = :id';
    $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
    $prepare->bindValue(':id', $id, PDO::PARAM_INT);
    $prepare->execute();
# クエリ結果をカラム名をキーとした連想配列で1行だけ取得します☆レシピ262☆（1行だけレコードを取得したい）。
    $row = $prepare->fetch(PDO::FETCH_ASSOC);

# 結果を表示します。
    if ($row !== false) {
      echo '選択した地域は: ' . h($row['area']);
    }
  } catch (PDOException $e) {
   echo 'エラーが発生しました。内容: ' . h($e->getMessage());
  }
}
?>
<br>
<input type="submit" value="送信する">
</form>
</div>
</body>
</html>
