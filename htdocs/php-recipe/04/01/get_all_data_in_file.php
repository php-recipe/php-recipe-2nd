<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルのデータをまとめて取得したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# ファイル名を設定します。
$fileName = '../../../../data/get_all_data_in_file-data.txt';

# ファイルの存在を確認します。
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# file_get_contents()関数でデータを取得します。
$fileData1 = file_get_contents($fileName);

# データを出力します。
echo '<p>file_get_contents()関数でデータを取得</p>';
var_dump(h($fileData1));

# file()関数でデータを取得します。
$fileData2 = file($fileName);

# データを出力します。
echo '<p>file()関数でデータを取得</p>';
var_dump(h($fileData2));
?>
</div>
</body>
</html>
