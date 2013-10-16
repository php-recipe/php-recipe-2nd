<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ファイルの拡張子を取得したい</title>
</head>
<body>
<div>
<?php
# 拡張子を取得するファイルにこのサンプルファイルを設定します。
$fileName = basename(__FILE__);

# ファイルの存在を確認します。
if (file_exists($fileName)) {
# パス情報を取得します。
  $pathinfo = pathinfo($fileName);

# ファイルの拡張子をブラウザに出力します。
  echo $fileName . ' の拡張子： ' . $pathinfo['extension'];
} else {
  echo 'ファイルが存在しません。';
}
?>
</div>
</body>
</html>
