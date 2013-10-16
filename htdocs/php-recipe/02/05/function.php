<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>関数を定義したい</title>
</head>
<body>
<div>
<?php
// ユーザー定義関数
function check($subject, $point)
{
  echo $subject . 'の結果:';
  if ($point > 75) {
    echo '合格です';
  } else {
    echo '不合格です';
  }
  echo '(点数:' . $point . ')<br>';
}

# 変数に数値を代入します。
$test1 = 84;
$test2 = 62;
$test3 = 78;

# ユーザー定義関数を実行します。
check('社会', $test1);
check('英語', $test2);
check('数学', $test3);
?>
</div>
</body>
</html>
