<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルを削除したい</title>
</head>
<body>
<div>
<?php
# 削除するファイル名を設定します。
$fileName = '../../../../data/output/unlink.txt';

# ファイルの存在を確認します。
if (file_exists($fileName)) {
# ファイルを削除します。
  if (is_writable($fileName) && unlink($fileName)) {
    echo "<p>$fileName を削除しました。</p>";
  } else {
    echo "<p>$fileName を削除できませんでした。</p>";
  }
} else {
  echo "<p>$fileName は存在しませんでした。</p>";
}
?>
</div>
</body>
</html>
