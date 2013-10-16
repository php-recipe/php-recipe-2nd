<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>変数の値渡しと参照渡し</title>
</head>
<body>
<div>
<?php
$a = '変更前';

# 値渡しです。$bには$aの値をコピーしたものが代入されます。
$b = $a;

# 参照渡しです。$cと$aは同じ値を指します。
$c =& $a;

echo '$a: ' . $a . ' ';
echo '$b: ' . $b . ' ';
echo '$c: ' . $c . '<br>';

$a = '変更後';

echo '$a: ' . $a . ' ';
echo '$b: ' . $b . ' ';
echo '$c: ' . $c . '<br>';
?>
</div>
</body>
</html>
