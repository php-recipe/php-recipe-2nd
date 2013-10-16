<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ディレクトリを作成したい</title>
</head>
<body>
<div>
<?php
# 作成するディレクトリ名を設定します。
$dir = '../../../../data/output/madeDir';

# ディレクトリの存在を確認します。
if (is_dir($dir)) {
  echo "<p>ディレクトリ $dir は既に存在しています。</p>";
} else {
# ディレクトリを作成します。
  if (mkdir($dir)) {
    echo "<p>ディレクトリ $dir の作成に成功しました。</p>";
  } else {
    echo "<p>ディレクトリ $dir の作成に失敗しました。</p>";
  }
}
?>
</div>
</body>
</html>
