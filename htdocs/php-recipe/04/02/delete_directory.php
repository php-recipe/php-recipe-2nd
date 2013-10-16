<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ディレクトリを削除したい</title>
</head>
<body>
<div>
<?php
# 削除するディレクトリ名を設定します。
$dir = '../../../../data/output/files';

$dirContentsNum = 0;  // ファイル数
# scandir()関数☆レシピ130☆（ディレクトリ内のディレクトリやファイル名を取得したい）でディレクトリ内のファイルなどの数を調べます。
if (is_dir($dir) && ($dirContents = scandir($dir)) !== false) {
# ディレクトリ自身「.」と親ディレクトリ「..」を配列から除外します。
  $dirContents = array_diff($dirContents, array('.', '..'));
  $dirContentsNum = count($dirContents);
}

# ディレクトリを削除します。
if ($dirContentsNum === 0 && is_writable($dir) && rmdir($dir)) {
  echo "<p>ディレクトリ $dir の削除に成功しました。</p>";
} else {
  echo "<p>ディレクトリ $dir の削除に失敗しました。</p>";
}
?>
</div>
</body>
</html>
