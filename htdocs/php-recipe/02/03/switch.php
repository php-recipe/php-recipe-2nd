<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>switch文の使い方を知りたい</title>
</head>
<body>
<div>
<?php
# 変数に文字列を代入します。
$point = 'C';

switch ($point) {
  case 'A':
    echo '合格ライン';
    break;

  case 'B':
    echo '追試ライン';
    break;

  default:
    echo '落第ライン';
    break;
}
?>
</div>
</body>
</html>
