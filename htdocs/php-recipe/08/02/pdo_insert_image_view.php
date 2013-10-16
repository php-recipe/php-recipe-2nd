<?php
# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../../../../conf/database_conf.php';
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます。
require_once '../../../../lib/h.php';

# ユーザーが入力したIDを検証します。
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
  $id = (int) $_GET['id'];
} else {
  exit('IDが不正です。');
}

try {
# MySQLデータベースに接続します☆レシピ260☆（データベースに接続したい）。
  $db = new PDO($dsn, $dbUser, $dbPass);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# SQL文を準備します。
  $sql = 'SELECT image FROM images WHERE id = :id';
  $prepare = $db->prepare($sql);
# SQL文のプレースホルダに値をバインドして、クエリを実行します。
  $prepare->bindValue(':id', $id, PDO::PARAM_INT);
  $prepare->execute();
# 結果をカラム名をキーとした連想配列で取得します。
  $result = $prepare->fetch(PDO::FETCH_ASSOC);
  if ($result && isset($result['image'])) {
    header("Content-Type: image/jpeg");
# Internet ExplorerがContent-Typeヘッダーを無視しないようにします☆レシピ287☆（XSS対策をしたい）。
    header('X-Content-Type-Options: nosniff');
    echo $result['image'];
  }
# エラーが発生した場合、PDOException例外がスローされるのでキャッチします。
} catch (PDOException $e) {
  echo 'エラーが発生しました。内容: ' . h($e->getMessage());
}
