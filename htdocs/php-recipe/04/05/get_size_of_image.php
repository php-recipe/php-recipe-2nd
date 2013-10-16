<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>画像のサイズを取得したい</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once '../../../../lib/h.php';

# 調べるファイル名を設定します。
$fileName = '../../../../data/getimagesize.jpg';
if (! file_exists($fileName)) {
  die('ファイルが存在しません。');
}

# 画像情報を取得します。
$imageInfo = getimagesize($fileName);

# 画像の情報を表示します。
echo '<table>';
echo '<tr><td>ファイル名</td>';
echo '<td>' . h($fileName) . '</td></tr>';
echo '<tr><td>幅</td>';
echo '<td>' . h($imageInfo[0]) . '</td></tr>';
echo '<tr><td>高さ</td>';
echo '<td>' . h($imageInfo[1]) . '</td></tr>';
echo '<tr><td>種類(1:gif, 2:jpg, 3:png, 4:swf, 17:icoなど)</td>';
echo '<td>' . h($imageInfo[2]) . '</td></tr>';
echo '<tr><td>&lt;img&gt;タグで直接利用できる文字列</td>';
echo '<td>' . h($imageInfo[3]) . '</td></tr>';

// 画像の形式によっては取得できない場合があるので、確認後表示
if (isset($imageInfo['bits'])) {
  echo '<tr><td>bits</td>';
  echo '<td>' . h($imageInfo['bits']) . '</td></tr>';
}
// 画像の形式によっては取得できない場合があるので、確認後表示
if (isset($imageInfo['channels'])) {
  echo '<tr><td>channels(3:RGB, 4:CMYK)</td>';
  echo '<td>' . h($imageInfo['channels']) . '</td></tr>';
}

echo '<tr><td>MIME</td>';
echo '<td>' . h($imageInfo['mime']) . '</td></tr>';
echo '</table>';

# 調べた画像を☆レシピ131☆（ディレクトリ内の画像を一覧表示したい）の「display.php」を使って表示します。
$url = '../02/display.php?file=' . rawurlencode(basename($fileName));
echo '<p><img src="' . h($url) . '" alt="写真"></p>';
?>
</div>
</body>
</html>
