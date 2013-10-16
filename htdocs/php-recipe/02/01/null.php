<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>null</title>
</head>
<body>
<div>
<?php
$a = null;
$b = '';

# どちらも値は何も表示されません。
echo '$a: ' . $a . '<br>';
echo '$b: ' . $b . '<br>';

if ($a == $b) {
  echo '$a と $b は等しい(==)<br>';
} else {
  echo '$a と $b は異なる(==)<br>';
}

if ($a === $b) {
  echo '$a と $b は等しい(===)<br>';
} else {
  echo '$a と $b は異なる(===)<br>';
}

if (is_null($a)) {
  echo '$a は null です<br>';
} else {
  echo '$a は null ではありません<br>';
}

if (isset($a)) {
  echo '$a は定義されています<br>';
} else {
  echo '$a は定義されていません<br>';
}
?>
</div>
</body>
</html>
