<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>==と===、!=と!==の違いは？</title>
</head>
<body>
<div>
<?php
# 変数に数値を代入します。
$year = 2013;
if ($year === 2013) {
  echo '$yearの値は2013と同一です<br>';
}

# 変数に数値と文字列を代入します。
$value1 = 5;
$value2 = '5';
if ($value1 === $value2) {
  echo '$value1と$value2は一致しました<br>';
}else {
  echo '$value1と$value2は一致しません<br>';
}

# 変数に文字列を代入します。
$place = 'Nagoya';
if ($place === 'Nagoya') {
  echo '$placeの値はNagoyaと同一です';
}
?>
</div>
</body>
</html>
