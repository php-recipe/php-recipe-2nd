<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>条件で処理を分岐するには？</title>
</head>
<body>
<div>
<?php
# 変数に数値を代入します。
$point     = 30;
$line      = 80;
$underline = 40;

# 変数を比較します。
if ($point >= $line) {
  echo '合格ライン';
} elseif ($point >= $underline) {
  echo '追試ライン';
} else {
  echo '落第ライン';
}
?>
</div>
</body>
</html>
