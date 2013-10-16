<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルが存在するか調べたい</title>
</head>
<body>
<div>
<?php
# ファイル名を設定します。
$fileName = '../../../../data/file-exists.txt';

# ファイルの存在を調べます。
if (file_exists($fileName)) {
  echo "<p>$fileName は存在するファイルです。</p>";
} else {
  echo "<p>$fileName は存在しないファイルです。</p>";
}
?>
</div>
</body>
</html>
