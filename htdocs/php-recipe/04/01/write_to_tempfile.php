<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>一時ファイルにデータを書き込みたい</title>
</head>
<body>
<div>
<?php
# 一時ファイルを作成します。
$tempFile = tmpfile();

# データを書き込みます。
fwrite($tempFile, '一時ファイルにデータを書き込みたい！');

# 一時ファイルのファイルポインタを先頭に戻し、ブラウザへ出力します。
rewind($tempFile);
fpassthru($tempFile);

# ファイルを閉じます。
fclose($tempFile);
?>
</div>
</body>
</html>
