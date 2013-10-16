<?php
# このサンプルには脆弱性が含まれています。このファイルは絶対に本番サーバーに
# アップロードしないでください。このページを利用して攻撃が可能です。

# データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '/../../../../conf/database_conf.php';

if (! isset($_GET['table'])) {
  exit('テーブル名を入力してください。');
}

$link = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

# ユーザーからの入力をエスケープし、SQLを生成します。
$sql = sprintf(
  'CREATE TABLE IF NOT EXISTS %s ('
  . 'id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, '
  . 'data VARCHAR(255) NOT NULL'
  . ')',
  mysqli_real_escape_string($link, $_GET['table'])
);

if (mysqli_multi_query($link, $sql)) {
  echo "テーブルを作成しました。テーブル名: {$_GET['table']}";
} else {
  echo 'テーブルを作成できませんでした。';
}
