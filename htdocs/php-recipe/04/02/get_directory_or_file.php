<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ディレクトリ内のディレクトリやファイル名を取得したい</title>
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# 調べるディレクトリ名を設定します。
$dirName = '.';
if (! is_dir($dirName)) {
  die('ディレクトリが存在しません。');
}

echo "<p>ディレクトリ名： $dirName </p>";
echo '<p>絶対パス： ' . realpath($dirName) . '</p>';
echo '<p>ディレクトリ内のディレクトリやファイル名一覧</p>';

# ディレクトリからディレクトリ／ファイル名を昇順で取得します。
$fileArrayAsc = scandir($dirName);
// 出力
echo '<pre>';
print_r(h($fileArrayAsc));
echo '</pre>';

# ディレクトリからディレクトリ／ファイル名を降順で取得します。
// 第2引数に「1」を設定、PHP5.4以降では「SCANDIR_SORT_DESCENDING」でも可
$fileArrayDesc = scandir($dirName, 1); 
// 出力
echo '<pre>';
print_r(h($fileArrayDesc));
echo '</pre>';
?>
</div>
</body>
</html>
