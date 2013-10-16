<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルのサイズを取得したい</title>
</head>
<body>
<div>
<?php
# サイズを取得するファイルにこのサンプルファイルを設定します。
$fileName = basename(__FILE__);

# ファイルのサイズをブラウザに出力します。
echo $fileName . ' のファイルサイズ： ';
echo filesize($fileName) . 'バイト';
?>
</div>
</body>
</html>
