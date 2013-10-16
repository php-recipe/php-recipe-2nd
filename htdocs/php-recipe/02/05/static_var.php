<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>静的変数</title>
</head>
<body>
<div>
<?php
function counter()
{
# $countは静的変数です。最初にこの関数が呼ばれたときにのみ初期化されます。
  static $count = 0;

  return ++$count;
}

echo counter() . '<br>';
echo counter() . '<br>';
echo counter() . '<br>';
?>
</div>
</body>
</html>
