<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>パス名からディレクトリ名を取得したい</title>
</head>
<body>
<div>
<?php
# パス名を設定します。
$pathName = '../test/sample/pathinfo.txt';  // 存在していないパス／ファイル

echo "<p>パス名： $pathName </p>";

# dirname()関数で取得、表示します。
echo '<p>dirname()関数で取得する</p>';
echo '<p>ディレクトリ名： ' . dirname($pathName) . '</p>';

# pathinfo()関数で取得、表示します。
$pathInfo = pathinfo($pathName);
echo '<p>pathinfo()関数で取得する</p>';
echo '<p>ディレクトリ名： ' . $pathInfo['dirname'] . '</p>';
?>
</div>
</body>
</html>
